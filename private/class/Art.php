<?php

class Art {
    private $code;
    private $titre;
    private $hauteur;
    private $epaisseur;
    private $largeur;
    private $flash;
    private $date_livraison;
    private $estLivre;
    private $descriptionFR;
    private $descriptionEN;
    private $descriptionCH;
    private $descriptionRU;
    private $descriptionDE;
    private $codeType;
    private $codeArtiste;

    // Getters
    public function getCode() {
        return $this->code;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function getHauteur() {
        return $this->hauteur;
    }
    public function getEpaisseur() {
        return $this->epaisseur;
    }
    public function getLargeur() {
        return $this->largeur;
    }
    public function getFlash() {
        return $this->flash;
    }
    public function getDateLivraison() {
        return $this->date_livraison;
    }   
    public function getEstLivre() {
        return $this->estLivre;
    }     
    public function getDescriptionFR() {
        return $this->descriptionFR;
    }
    public function getDescriptionEN() {
        return $this->descriptionEN;
    }
    public function getDescriptionCH() {
        return $this->descriptionCH;
    }
    public function getDescriptionRU() {
        return $this->descriptionRU;
    }
    public function getDescriptionDE() {
        return $this->descriptionDE;
    }
    public function getCodeType() {
        return $this->codeType;
    }
    public function getCodeArtiste() {
        return $this->codeArtiste;
    }

    // Setters
    public function setCode($code) {
        $this-> titre = $code;
    }
    public function setTitre($titre) {
        $this-> titre = $titre;
    }
    public function setHauteur($hauteur) {
        $this-> titre = $hauteur;
    }
    public function setLargeur($largeur) {
        $this-> titre = $largeur;
    }
    public function setEpaisseur($epaisseur) {
        $this-> titre = $epaisseur;
    }
    public function setFlash($flash) {
        $this-> flash = $flash;
    }
    public function setDateLIvraison($dateLivraison) {
        $this-> flash = $dateLivraison;
    }
    public function setEstLivre($estLivre) {
        $this-> flash = $estLivre;
    }
    public function setDescriptionFR($descriptionFR) {
        $this-> titre = $descriptionFR;
    }
    public function setDescriptionEN($descriptionEN) {
        $this-> titre = $descriptionEN;
    }
    public function setDescriptionCH($descriptionCH) {
        $this-> titre = $descriptionCH;
    }
    public function setDescriptionRU($descriptionRU) {
        $this-> titre = $descriptionRU;
    }
    public function setDescriptionDE($descriptionDE) {
        $this-> titre = $descriptionDE;
    }
    public function setCodeType($codeType) {
        $this-> titre = $codeType;
    }
    public function setCodeArtiste($codeArtiste) {
        $this-> titre = $codeArtiste;
    }
}