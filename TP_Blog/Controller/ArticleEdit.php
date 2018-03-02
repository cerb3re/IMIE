<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 02/03/2018
 * Time: 11:38
 */

namespace Blog\Controller;

include(dirname(__FILE__).'/Controller.php');

include('./DAO/EntityArticle.php');
//include(dirname(__FILE__).'/../model/dao/CategorieStore.php');

use DAO\EntityArticle\EntityArticle as articles;
class ArticleEdit extends Controller
{
    public function run()
    {
        $searchStr = filter_input(INPUT_GET, 'search', FILTER_SANITIZE_STRING);
        $searchId = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_STRING);
        $authorBy = articles::getAuthor($searchId);
        $articlesBy = articles::getArticleBy($searchId);
        if ($searchStr) {
            $articleSearch = \Blog\Model\Article::getArticlesBy($searchStr);
        } else {
            $articlesFull = articles::getArticlesFull();
            $auteur = articles::getAuthor();
            $categorie = articles::getCategories();
        }
        //render view
            $articlesBy = articles::getArticleBy($searchId);

            $this->render('ArticleEditView', array(
                "articlesFull" => $articlesFull,
                "auteur"=>$auteur,
                "articleBy" => $articlesBy,
                "AuthorBy"=>$authorBy,
                "categorie"=>$categorie,
                "search" => $searchStr,
                // "categories"=> $categories,
                "isadmin" => $this->isAdmin()));
    }
}