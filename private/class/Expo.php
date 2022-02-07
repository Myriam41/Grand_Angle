<?php

class Expo {
    private $code;
    private $titre;
    private $dateDebut;
    private $dateFin;

    // Getters
    public function getCode() {
        return $this->code;
    }
    public function getTitre() {
        return $this->titre;
    }
    public function getDateDebut() {
        return $this->dateDebut;
    }
    public function getDateFin() {
        return $this->dateFin;
    }

    // Setters
    public function setCode($code) {
        $this-> titre = $code;
    }
    public function setTitre($titre) {
        $this-> titre = $titre;
    }
    public function setDateDebut($date) {
        $this-> titre = $date;
    }
    public function setDateFin($date) {
        $this-> titre = $date;
    }
}