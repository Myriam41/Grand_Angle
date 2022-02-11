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
        $this-> code = $code;
    }
    public function setTitre($titre) {
        $this-> titre = $titre;
    }
    public function setDateDebut($dateDebut) {
        $this-> date = $dateDebut;
    }
    public function setDateFin($dateFin) {
        $this-> titre = $dateFin;
    }
}