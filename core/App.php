<?php

/**
 * Main class that will contain all classes
 */
class App {

    /** @var array Config for class */
    private $_config;

    /** @var array Array of request data and url */
    private $_request;

    /** @var array|null User data */
    private $_user;

    /** @var \components\SignAPI api instance */
    private $_api;

    public function __construct($config = array()) {
        $this->_config = array_merge(array(
            'appName' => 'SignID',
            'appVersion' => 'v1.0.0',
            'apiKey' => '9b0823c8c17cb8a397e8aa3977a4e83c856301686aef8ff66a15a2fbe78a3536',
            'apiUrl' => 'http://api.signtologin.com/api/v3/',
            'basePath' => dirname(dirname(__FILE__)), //better if index.php will set it
            'corePath' => dirname(__FILE__), //better if index.php will set it
            'docsRoot' => $_SERVER['DOCUMENT_ROOT'],
            'domain' => (strstr(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') ?
                    'https://' : 'http://') . $_SERVER['HTTP_HOST'],
            'baseUri' => (strstr(strtolower($_SERVER['SERVER_PROTOCOL']), 'https') ?
                'https://' : 'http://') . $_SERVER['HTTP_HOST'] .
                str_replace('index.php', '', $_SERVER['PHP_SELF']),
            'offset' => trim(str_replace($_SERVER['DOCUMENT_ROOT'], '', dirname(dirname(__FILE__))), '/')
        ), $config);
    }

    public function processState() {
        session_start();
        $this->_api = new \components\SignAPI($this->getConfig('apiUrl'));
        $this->_api->addHeader("apiKey: {$this->getConfig('apiKey')}");
        if (!empty($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $this->_api->addHeader("token: {$token}");
            $response = $this->_api->get('/me');

            if (empty($response['user'])) {
                $this->_user = $response['user'];
            } else {
                var_dump($response);
            }
        }
    }

    public function parseUrl() {
        $this->_request = parse_url($_SERVER['REQUEST_URI']);
        if (isset($this->_request['query'])) {
            parse_str($this->_request['query'], $this->_request['variables']);
        }

        if (isset($this->_request['path'])) {
            $this->_request['path'] = trim(str_replace($this->getConfig('offset'), '', $this->_request['path']), '/');
        }
    }

    public function render() {
        if ($this->getView()) {
            $view = "\\views\\" . ucfirst($this->getView());
            if (class_exists($view)) {
                $view = new $view($this);
            }
        }

        if (!isset($view) || !is_object($view)) {
            $view = new \views\Index($this);
        }

        $view->render();
    }

    public function process() {
        $action = isset($this->_request['path']) ?
            trim(str_replace('api/', '', $this->_request['path']), '/') : '';

        if (!empty($_POST)) {
            $result = $this->_api->post($action, $_POST);
        } else {
            $result = $this->_api->get($action);
        }

        if (empty($result)) {
            echo json_encode(array(
                'error' => $this->_api->getError(),
                'message' => 'Connection lost'
            ));
        } else {
            echo json_encode($result);
        }
        die;
    }

    public function run() {
        $this->processState();
        $this->parseUrl();
        if ($this->isWeb()) {
            $this->render();
        } elseif ($this->isApi()) {
            $this->process();
        } else {
            die();
        }
    }

    public function isWeb() {
        return !$this->isApi();
    }

    public function isApi() {
        if (empty($this->_request['path'])) {
            return false;
        }

        return strstr($this->_request['path'], 'api/');
    }

    /**
     * Returns view name, than parsed from request
     * @return bool|string
     */
    public function getView() {
        if (empty($this->_request['path'])) {
            return false;
        }
        $info = pathinfo($this->_request['path']);
        $dir = isset($info['dirname']) ? $info['dirname'] : '';
        $file = isset($info['filename']) ? $info['filename'] : '';
        return ('.' === $dir ? '' : $dir) . $file;
    }

    /**
     * Getter for config
     * @param string $key
     * @param mixed $default
     * @return mixed|null
     */
    public function getConfig($key, $default = null) {
        return isset($this->_config[$key]) ? $this->_config[$key] : $default;
    }
}