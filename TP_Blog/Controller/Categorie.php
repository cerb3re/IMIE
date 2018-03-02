<?php

namespace Blog\Controller;

include(dirname(__FILE__).'/Controller.php');

include('./DAO/EntityCategorie.php');
//include(dirname(__FILE__).'/../model/dao/CategorieStore.php');

use DAO\EntityArticle\EntityArticle as articles;


class Categorie extends Controller{

    public function run(){
        $searchStr = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        if ($searchStr){
            $articles = \Blog\Model\Categorie::getCategorieBy($searchStr);
        }else{
             //$articles = \DAO\EntityCategorie::;

        }
        
        
              //render view
        $this->render('ArticleView', array(
            "articles"=>$articles,
            "search"=> $searchStr,
            "author"=>$auteurs,
           // "categories"=> $categories,
            "isadmin" => $this->isAdmin()));
    }
}