<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace DAO\EntityArticle;

require_once(dirname(__FILE__).'/DaoBdd.php');
require_once('./Model/Article.php');

use Blog\Controller\Categorie;
use \PDO as PDO;

class EntityArticle {

    public static function getArticleBySearch($str) {
        $pdo = \DAO\BDD\bdd::getConnexion();
        $stmt = $pdo->prepare("SELECT * FROM article WHERE article.titre LIKE :str");
        $stmt->execute(array('str' => '%'. $str.'%'));

        $pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);

        return $pls;
    }

    public static function deleteArticleBy($id) {
        $pdo = \DAO\BDD\bdd::getConnexion();
        $stmt = $pdo->prepare("DELETE FROM `test`.`article` WHERE `article`.`id` =:id");
        $stmt->execute([
            "id"=>$id
        ]);

        //$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
        $pls = "DELETE OK";
        return $pls;
    }


    public static function getArticleBy($id) {
        $pdo = \DAO\BDD\bdd::getConnexion();
        $stmt = $pdo->prepare("SELECT c.nom, article.date_publication, article.contenu, article.titre, u.email, u.prenom, u.nom FROM article INNER JOIN categorie c ON article.id_categorie = c.id INNER JOIN utilisateur u ON article.id_auteur = u.id WHERE article.id =:id");
        $stmt->execute([
            "id"=>$id
        ]);

        $pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);

        return $pls;
    }

    public static function getArticlesFull() {
        $pdo = \DAO\BDD\bdd::getConnexion();

        $stmt = $pdo->prepare("SELECT article.id, contenu, titre, date_publication, c.nom, u.nom, u.prenom, u.email FROM article INNER JOIN categorie c ON article.id_categorie = c.id INNER JOIN utilisateur u ON article.id_auteur = u.id;");
        $stmt->execute();

        $pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);

        return $pls;
    }

    public static function getArticles(){
       // connection BDD
	$pdo = \DAO\BDD\bdd::getConnexion();
	
			
	$stmt = $pdo->prepare("SELECT * FROM article");
        $stmt->execute();

	$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
       
	return $pls;
    }
    
    public static function getAuthor(){
        $pdo = \DAO\BDD\bdd::getConnexion();
	
			
        $stmt = $pdo->prepare("SELECT nom, prenom, email FROM article INNER JOIN utilisateur ON article.id_auteur = utilisateur.id");
            $stmt->execute();

        $pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
        return $pls;
    }

    public static function getAuthorBy($id) {
        $pdo = \DAO\BDD\bdd::getConnexion();


        $stmt = $pdo->prepare("SELECT nom, prenom, email FROM article INNER JOIN utilisateur ON :id = utilisateur.id");
        $stmt->execute([
            "id"=>$id
        ]);

        $pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
        return $pls;

    }
    public static function getCategories(){
       // connection BDD
	$pdo = \DAO\BDD\bdd::getConnexion();
	
			
	$stmt = $pdo->prepare("SELECT nom FROM article INNER JOIN categorie ON article.id_categorie = categorie.id");
        $stmt->execute();

	$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
       
	return $pls;
    }
}
