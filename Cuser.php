<?php

/**
 * Description of Cuser
 *
 * @author Serge
 */
class Cuser implements WBinterface{

    private $login;
    private $pass;
    private $nom;
    private $prenom;
    private $deleted;
    
    public function __construct($login, $pass, $nom, $prenom, $deleted = FALSE) {
        $this->login = $login;
        $this->pass = $pass;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->deleted = $deleted;
    }

        public function getLogin() {
        return $this->login;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getDeleted() {
        return $this->deleted;
    }

    public function setLogin($login) {
        $this->login = $login;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setDeleted($deleted) {
        $this->deleted = $deleted;
    }
    
    public function __toString() {
        return $this->login;
    }

    public function valide() {
        
    }

    public function save($base) {
        
    }

}
