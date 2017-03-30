<?php

namespace views;

class Activity extends BaseView {

    public function render() {
        if ($this->getOwner()->isGuest()) {
            header('Location: index.html');
            die;
        }

        $this->renderTemplate(array(
            'deviceLogs' => $this->getOwner()->getApi()->get('/me/logs/devices'),
            'signLogs' => $this->getOwner()->getApi()->get('/me/logs/signs')
        ));
    }

}