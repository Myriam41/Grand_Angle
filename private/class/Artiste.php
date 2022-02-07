<?php

class Artiste {
    private $code;
    private $nom;
    private $prenom;
    private $nomUsuel;
    private $tel;
    private $mail;
    private $adresse;
    private $cp;
    private $ville;
    private $biographieFR;
    private $biographieEN;
    private $biographieCH;
    private $biographieRU;
    private $biographieDE;

    // Getters
    public function getCode() {
        return $this->code;
    }
    public function getNom() {
        return $this->nom;
    }
    public function getPrenom() {
        return $this->prenom;
    }    
    public function getNomUsuel() {
        return $this->nomUsuel;
    }
    public function getTel() {
        return $this->tel;
    }
    public function getMail() {
        return $this->mail;
    }
    public function getAdresse() {
        return $this->adresse;
    }
    public function getCP() {
        return $this->cp;
    }
    public function getVille() {
        return $this->ville;
    }
    public function getbiographieFR() {
        return $this->biographieFR;
    }
    public function getbiographieEN() {
        return $this->biographieEN;
    }
    public function getbiographieCH() {
        return $this->biographieCH;
    }
    public function getbiographieRU() {
        return $this->biographieRU;
    }
    public function getbiographieDE() {
        return $this->biographieDE;
    }

    // Setters
    public function setCode($code) {
        $this-> nom = $code;
    }
    public function setNom($nom) {
        $this-> nom = $nom;
    }
    public function setPrenom($prenom) {
        $this-> nom = $prenom;
    }
    public function setNomUsuel($nomUsuel) {
        $this-> nom = $nomUsuel;
    }
    public function setTel($tel) {
        $this-> nom = $tel;
    }
    public function setMail($mail) {
        $this-> mail = $mail;
    }
    public function setAdresse($adresse) {
        $this-> adresse = $adresse;
    }
    public function setCP($cp) {
        $this-> cp = $cp;
    }
    public function setVille($ville) {
        $this-> ville = $ville;
    }
    public function setbiographieFR($biographieFR) {
        $this-> nom = $biographieFR;
    }
    public function setbiographieEN($biographieEN) {
        $this-> nom = $biographieEN;
    }
    public function setbiographieCH($biographieCH) {
        $this-> nom = $biographieCH;
    }
    public function setbiographieRU($biographieRU) {
        $this-> nom = $biographieRU;
    }
    public function setbiographieDE($biographieDE) {
        $this-> nom = $biographieDE;
    }
}