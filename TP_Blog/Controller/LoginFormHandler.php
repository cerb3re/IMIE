<?php

namespace Blog\Controller;
use Blog\Model\DaoUser;
include('DAO/DaoUser.php');

include(dirname(__FILE__).'/Controller.php');

class LoginFormHandler extends Controller{  
    
    public function run() {
        $username = filter_input(INPUT_POST, 'nom', FILTER_SANITIZE_STRING);
        $passwd = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
        
        if ($username && $passwd){
            
            $user = DaoUser::getUser($username);
            if (!$user){
                $this->errors = "wrong password or username";
            }else{
                var_dump($user->getPassword());
                //check why sha1 not compare
                $sha1 = sha1($user->getPassword());
                 if (!password_verify($passwd, $user->getPassword())){           
                     $this->errors= "wrong password or username";
                }else{
                    $_SESSION['user_id'] = $user->getId();
                    $_SESSION['current_user'] = $user->getNom();
                    //fake admin role
                    $_SESSION['isadmin'] = false;
                    if ($user->getNom()=='admin'){
                        $_SESSION['isadmin'] = true;
                    }
                    header("Location: index.php?action=Article",true,303);
                    
                }
                
                
                
            }
            
           
            
           
        }else{
            $this->errors = 'username and password are mandatory';
        }
        
        if ($this->hasErrors()){
            //rebuild the form
            $this->render('LoginFormView', array("errors"=> $this->errors));
        }
    }
}