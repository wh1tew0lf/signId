<?php

namespace views;


class Logout extends BaseView {

    public function render() {
        unset($_SESSION['token']);
        header('Location: index.html');
        die;
    }
}