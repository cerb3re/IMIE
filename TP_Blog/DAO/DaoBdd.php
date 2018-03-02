<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 01/03/2018
 * Time: 14:05
 */

namespace DAO\BDD;

use \PDO as PDO;

class bdd
{
    private static $bdd;
    
    public static function getConnexion() {
        if (self::$bdd == null) {
            try {
                self::$bdd = new PDO(SQL_DSN, 
                                    SQL_USERNAME, 
                                    SQL_PASSWORD, 
                                    array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES \'UTF8\''));
                self::$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        }
        
        return (self::$bdd);
    }

    public function getUser() {
        $printArticle = $this->bdd->query('SELECT * FROM utilisateur');

        $user = $printArticle->fetchAll();
        return ($user);
    }



    public function getAllArticle() {
        $printArticle = $this->bdd->query('SELECT * FROM article');

        $articles = $printArticle->fetchAll();
        return ($articles);
    }

 
}