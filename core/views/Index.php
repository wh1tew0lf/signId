<?php

namespace views;

class Index {
    /** @var \App application class */
    private $_owner;

    public function __construct($owner) {
        $this->_owner = $owner;
    }

    public function render() {
        $path = $this->_owner->getConfig('corePath');

        require_once "{$path}/tpls/main.php";
    }
}