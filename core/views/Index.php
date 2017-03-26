<?php

namespace views;

class Index {
    /** @var \App application class */
    private $_owner;

    public function __construct($owner) {
        $this->_owner = $owner;
    }

    public function render() {
        $path = $this->getOwner()->getConfig('corePath');

        require_once "{$path}/templates/index.php";
    }

    /**
     * @return \App
     */
    public function getOwner() {
        return $this->_owner;
    }

}