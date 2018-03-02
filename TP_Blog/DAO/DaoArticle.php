<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 01/03/2018
 * Time: 16:52
 */

use DAO\BDD;

class DaoArticle {
    private $id, $titre, $contenu, $date_publication, $id_article, $id_auteur;
    
    function getId() {
        return $this->id;
    }

    function getTitre() {
        return $this->titre;
    }

    function getContenu() {
        return $this->contenu;
    }

    function getDate_publication() {
        return $this->date_publication;
    }

    function getId_article() {
        return $this->id_article;
    }

    function getId_auteur() {
        return $this->id_auteur;
    }

    function setId($id) {
        $this->id = $id;
    }

    function setTitre($titre) {
        $this->titre = $titre;
    }

    function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    function setDate_publication($date_publication) {
        $this->date_publication = $date_publication;
    }

    function setId_article($id_article) {
        $this->id_article = $id_article;
    }

    function setId_auteur($id_auteur) {
        $this->id_auteur = $id_auteur;
    }


}