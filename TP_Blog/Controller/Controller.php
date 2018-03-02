<?php

namespace Blog\Controller;

include(dirname(__FILE__).'/IController.php');

abstract class Controller implements IController {

    protected $errors="";
    protected $current_userid;
    protected $current_username;
    protected $isAdmin;
      
    public function render($template, $data = NULL){
        require(PATH_VIEW.'/'.$template.'.php');
    }
   
    public function hasErrors(){
        return (!empty($this->errors));
    }
    public function getErrors(){
        return $this->errors;
    }
    
    public function setErrors($errors){
        $this->errors = $errors;
    }
    
    public function setCurrentUserId($userid){
        $this->current_userid = $userid;
    }
    
     public function getCurrentUserId(){
       return $this->current_userid;
    }
    
    function isAdmin() {
        return $this->isAdmin;
    }
    function setIsAdmin($isAdmin) {
        $this->isAdmin = $isAdmin;
    }
        
    function getCurrentUsername() {
        return $this->current_username;
    }
    function setCurrentUsername($current_username) {
        $this->current_username = $current_username;
    }
    
    public abstract function run();
}