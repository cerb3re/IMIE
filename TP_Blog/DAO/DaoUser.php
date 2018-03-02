<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 01/03/2018
 * Time: 16:54
 */

namespace Blog\Model;

require(dirname(__FILE__).'\DaoBdd.php');
require(dirname(__FILE__).'/../Model/User.php');

use Blog\Model\User;
use DAO\BDD;
use \PDO as PDO;

class DaoUser
{    
    static function getUser($username){
        $pdo = BDD\bdd::getConnexion();
	
	$stmt = $pdo->prepare('SELECT * FROM utilisateur WHERE nom = :username');
        $stmt->bindValue(':username', $username);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, User\User::class);
	$user = $stmt->fetch();
	return $user;
    }
}