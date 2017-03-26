<?php

namespace views;

class Dashboard extends BaseView {

    public function render() {
        if ($this->getOwner()->isGuest()) {
            header('Location: index.html');
            die;
        }

        $this->renderTemplate($this->getOwner()->getApi()->get('/me/devices'));
    }

}