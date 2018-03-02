<?php

namespace Blog\Controller;

include(dirname(__FILE__).'/Controller.php');

class LogoutHandler extends Controller{

    public function run() {
        session_destroy();
        header("Location: /");
    }
}