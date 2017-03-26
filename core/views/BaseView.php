<?php

namespace views;


abstract class BaseView {
    /** @var \App application class */
    private $_owner;

    public function __construct($owner) {
        $this->_owner = $owner;
    }

    abstract public function getTemplate();

    public function render() {
        $path = $this->getOwner()->getConfig('corePath');
        require_once "{$path}/templates/{$this->getTemplate()}.php";
    }

    /**
     * @return \App
     */
    public function getOwner() {
        return $this->_owner;
    }
}