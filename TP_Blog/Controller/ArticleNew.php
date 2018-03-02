<?php

namespace Blog\Controller;

//include('DAO/DaoUser.php');

include(dirname(__FILE__).'/Controller.php');

class PlayListNew extends Controller {
    
    public function run(){
        
        $this->render('ArticleFormView'); //we pass a fake object 
    }
}
