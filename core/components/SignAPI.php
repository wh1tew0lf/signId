<?php

namespace components;

class SignAPI {

    /** @var array curl last request info */
    private $_info;

    /** @var mixed curl last request error */
    private $_error;

    /** @var mixed curl last request content */
    private $_response;

    /** @var array predefined headers */
    private $_headers = array();

    private function makeRequest($url, $headers = array(), $options = array()) {
        $ch = curl_init();

        curl_setopt_array($ch, array_merge(array(
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
            CURLOPT_URL => $url,
            CURLOPT_HTTPHEADER => array_merge($headers, $this->_headers)
        ), $options));

        $this->_response = curl_exec($ch);
        $this->_info = curl_getinfo($ch);
        $this->_error = curl_error($ch);
        curl_close($ch);

        return $this->_response;
    }

    public function get($url, $headers = array()) {
        return $this->makeRequest($url, $headers);
    }

    public function post($url, $post, $headers = array()) {
        return $this->makeRequest($url, $headers, array(
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
     * @return mixed
     */
    public function getError() {
        return $this->_error;
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