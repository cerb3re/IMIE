<?php
namespace Blog\Controller;

include(dirname(__FILE__).'/Controller.php');

include('./DAO/EntityArticle.php');
//include(dirname(__FILE__).'/../model/dao/CategorieStore.php');

use DAO\EntityArticle\EntityArticle as articles;

class ArticleDelete extends Controller
{
    public function run()
    {
        $searchStr = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        $searchId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $articlesBy = articles::getCategories();
        $authorBy = articles::deleteArticleBy($searchId);
        $deleteArt = articles::deleteArticleBy($searchId);
        if ($searchStr) {
            $articleSearch = \Blog\Model\Article::getArticlesBy($searchStr);
        } else {
            $articlesFull = articles::getArticlesFull();
            $auteur = articles::getAuthor();
            $categorie = articles::getCategories();

        }
        //render view
        if ($searchId) {
            $articlesBy = articles::getArticleBy($searchId);
            $this->render('ArticleView', array(
                "articlesFull" => $articlesFull,
                "articleBy" => $articlesBy,
                "auteur"=>$auteur,
                "categorie"=>$categorie,
                "search" => $searchStr,
                "deleteArticle"=>$deleteArt,
                "AuthorBy"=>$authorBy,
                // "categories"=> $categories,
                "isadmin" => $this->isAdmin()));
        } else {
            $this->render('ArticleView', array(
                "articlesFull" => $articlesFull,
                "auteur"=>$auteur,
                "articleBy" => $articlesBy,
                "categorie"=>$categorie,
                "search" => $searchStr,
                "deleteArticle"=>$deleteArt,
                // "categories"=> $categories,
                "isadmin" => $this->isAdmin()));
        }
    }
}
