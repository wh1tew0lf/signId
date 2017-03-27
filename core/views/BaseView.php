<?php

namespace views;


abstract class BaseView {
    /** @var \App application class */
    private $_owner;

    public function __construct($owner) {
        $this->_owner = $owner;
    }

    public function getTemplate($template = false) {
        $path = $this->getOwner()->getConfig('corePath');
        if (false === $template) {
            $reflection = new \ReflectionClass($this);
            $template = strtolower($reflection->getShortName());
        }
        return "{$path}/templates/{$template}.php";
    }

    abstract public function render();

    protected function renderBlock($name, $data = array()) {
        extract($data);
        require_once $this->getTemplate($name);
    }

    protected function renderTemplate($data = array()) {
        extract($data);
        require_once $this->getTemplate();
    }

    /**
     * @return \App
     */
    public function getOwner() {
        return $this->_owner;
    }
}