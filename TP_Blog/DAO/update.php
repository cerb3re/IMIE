<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 01/03/2018
 * Time: 14:02
 */
include_once "./DAO/bdd.php";

use DAO\BDD;

class update
{
    protected $bdd;
    private $statusMsg = "ERROR";

    public function initBddArticle(PDO $bdd) {
        $this->bdd = $bdd;
    }

    public function UpdateArticleBy($id, $titre, $contenu, $date_publication) {

    }

    public function updateUserBy($id, $bdd) {

    }

    public function updateCategorieBy($id, $name) {
        $req = $this->bdd->prepare('UPDATE `test`.`categorie` SET nom =:nom WHERE id =:id;');
        $req->execute([
            'id' => $id,
            'nom' => $name
        ]);

        $this->statusMsg = "Insert OK";

        return($this->statusMsg);
    }
}