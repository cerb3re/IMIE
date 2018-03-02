<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
namespace DAO\EntityCategorie;

class EntityCategorie {
       public static function getCategories(){
       // connection BDD
	$pdo = \DAO\BDD\bdd::getConnexion();
	
			
	$stmt = $pdo->prepare("SELECT * FROM categories");
        $stmt->execute();

	$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
       
	return $pls;
    }
    
       public static function getCategoriesBy($id){
       // connection BDD
	$pdo = \DAO\BDD\bdd::getConnexion();
	
			
	$stmt = $pdo->prepare("SELECT * FROM categories ");
        $stmt->execute();

	$pls = $stmt->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, \Blog\Model\Article\Article::class);
       
	return $pls;
    }
}