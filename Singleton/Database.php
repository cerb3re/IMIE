<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 07/03/2018
 * Time: 10:50
 */

namespace Singleton;
require_once "Config.php";

use \PDO as PDO;


class Database
{
    private $id;
    private static $pdo = null;

    public static function getConnection() {
        try {
            Config::getInstance();
            $hostname   = Config::fetchParameter('database', 'hostname');
            $dbname     = Config::fetchParameter('database', 'dbname');
            $user       = Config::fetchParameter('database', 'user');
            $pass       = Config::fetchParameter('database', 'password');

            self::$pdo = new pdo("mysql:host=$hostname; dbname=$dbname",$user, $pass);
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        
        return self::$pdo;
    }

    public function getUser() {
        $db = self::getConnection();

        $sth = $db->prepare("SELECT * FROM utilisateur");
        $sth->execute();
        $res = $sth->fetchAll();

        return $res;
    }
}
$connexion = new Database();
foreach ($connexion->getUser() as $user) {
    echo $user['nom']. ' ';
    echo $user['prenom'].PHP_EOL;
}