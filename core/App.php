<?php

/**
 * Main class that will contain all classes
 */
class App {

    /** @var array Config for class */
    private $_config;

    /** @var array Array of request data and url */
    private $_request;

    public function __construct($config = array()) {
        $this->_config = array_merge(array(
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

    public function process_state() {
        session_start();
    }

    public function parse_url() {
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


    public function run() {
        $this->process_state();
        $this->parse_url();
        $this->render();
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