<?php
/**
 * Created by PhpStorm.
 * User: Administrateur
 * Date: 01/03/2018
 * Time: 14:23
 */

namespace Blog\Model\Article;

use Blog\Model\Categorie\Categorie;
use Blog\Model\User;

class Article
{
    private $id, $titre, $contenu, $date_publication, $id_categorie, $id_auteur, $user;
    private $nom, $prenom, $email, $categorie;

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie(Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    
    function getEmail() {
        return $this->email;
    }

    function setEmail($email) {
        $this->email = $email;
    }

    
    function getId_categorie() {
        return $this->id_categorie;
    }

    function getNom() {
        return $this->nom;
    }

    function getPrenom() {
        return $this->prenom;
    }

    function setId_categorie($id_categorie) {
        $this->id_categorie = $id_categorie;
    }

    function setNom($nom) {
        $this->nom = $nom;
    }

    function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

        /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    /**
     * @return mixed
     */
    public function getDatePublication()
    {
        return $this->date_publication;
    }

    /**
     * @param mixed $date_publication
     */
    public function setDatePublication($date_publication)
    {
        $this->date_publication = $date_publication;
    }

    /**
     * @return mixed
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param mixed $id_article
     */
    public function setIdCategorie($id_article)
    {
        $this->id_categorie = $id_categorie;
    }

    /**
     * @return mixed
     */
    public function getIdAuteur()
    {
        return $this->id_auteur;
    }

    /**
     * @param mixed $id_auteur
     */
    public function setIdAuteur($id_auteur)
    {
        $this->id_auteur = $id_auteur;
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

    function getUser() {
        return $this->user;
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

    function setUser($user) {
        $this->user = $user;
    }


}