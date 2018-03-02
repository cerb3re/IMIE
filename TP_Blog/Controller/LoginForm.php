<?php

namespace Blog\Controller;

include('./Controller/Controller.php');

class LoginForm extends Controller{
    public function run() {
        
        
        $this->render('LoginFormView'); 
        
    }
}