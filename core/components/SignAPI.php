<?php

namespace components;

class SignAPI {

    /** @var string API getaway */
    private $_getaway = 'http://api.signtologin.com/api/v3/';

    /** @var array curl last request info */
    private $_info;

    /** @var string curl last request error */
    private $_error;

    /** @var integer curl last request error code */
    private $_errno;

    /** @var mixed curl last request content */
    private $_response;

    /** @var array predefined headers */
    private $_headers = array();

    public function __construct($getaway = false) {
        if (false !== $getaway) {
            $this->_getaway = $getaway;
        }
    }

    private function _makeRequest($url, $headers = array(), $options = array()) {
        $ch = curl_init();

        curl_setopt_array($ch, $options + array(
            CURLOPT_TIMEOUT => 30,
            CURLOPT_AUTOREFERER => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_NONE,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_DNS_USE_GLOBAL_CACHE => false,
            CURLOPT_DNS_CACHE_TIMEOUT => 2,
            CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            CURLOPT_URL => $this->_getaway . ltrim($url, '/'),
            CURLOPT_HTTPHEADER => array_merge($headers, $this->_headers)
        ));

        $this->_response = curl_exec($ch);
        $this->_info = curl_getinfo($ch);
        $this->_error = curl_error($ch);
        $this->_errno = curl_errno($ch);
        curl_close($ch);

        return json_decode($this->_response, true);
    }

    public function get($url, $headers = array()) {
        return $this->_makeRequest($url, $headers);
    }

    public function post($url, $post, $headers = array()) {
        return $this->_makeRequest($url, $headers, array(
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $post
        ));
    }

    /**
     * @return array
     */
    public function getInfo() {
        return $this->_info;
    }

    /**
     * @return string
     */
    public function getError() {
        return $this->_error;
    }

    /**
     * @return integer
     */
    public function getErrno() {
        return $this->_errno;
    }

    /**
     * @return mixed
     */
    public function getResponse() {
        return $this->_response;
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->_headers;
    }

    /**
     * Clear headers
     */
    public function clearHeaders() {
        $this->_headers = array();
    }

    /**
     * @param string $header
     */
    public function addHeader($header) {
        $this->_headers[] = $header;
    }

}