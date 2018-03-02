<?php

namespace Blog\Controller;

include(dirname(__FILE__).'\Controller.php');

include('./DAO/EntityArticle.php');
//include(dirname(__FILE__).'/../model/dao/CategorieStore.php');

use DAO\EntityArticle\EntityArticle as articles;

class Welcome extends Controller {
    
 public function run()
 {
     $searchStr = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
     $searchId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
     $articlesBy = articles::getCategories();
     $articlesFull = articles::getArticlesFull();
     $auteur = articles::getAuthor();
     $categorie = articles::getCategories();
     $articleSearch = [];

     //render view
     if ($searchStr)
         $articleSearch = articles::getArticleBySearch($searchStr);
     if ($searchId) {
         $articlesBy = articles::getArticleBy($searchId);
         $this->render('ArticleView', array(
             "articlesFull" => $articlesFull,
             "articleBy" => $articlesBy,
             "auteur"=>$auteur,
             "categorie"=>$categorie,
             "search" => $articleSearch,
             // "categories"=> $categories,
             "isadmin" => $this->isAdmin()));
     } else {
         $this->render('ArticleView', array(
             "articlesFull" => $articlesFull,
             "auteur"=>$auteur,
             "articleBy" => $articlesBy,
             "categorie"=>$categorie,
             "search" => $articleSearch,
             // "categories"=> $categories,
             "isadmin" => $this->isAdmin()));
     }
 }
}
