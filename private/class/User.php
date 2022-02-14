<?php

class User {
    private $code;
    private $identifiant;
    private $pass;
    private $admin;

    // Getters
    public function getCode() {
        return $this->code;
    }
    public function getIdentifiant() {
        return $this->identifiant;
    }
    public function getPass() {
        return $this->pass;
    }
    public function getAdmin() {
        return $this->admin;
    }

    // Setters
    public function setCode($code) {
        $this-> code = $code;
    }
    public function setIdentifiant($identifiant) {
        $this-> identifiant = $identifiant;
    }
    public function setPass($pass) {
        $this-> pass = $pass;
    }
    public function setAdmin($admin) {
        $this-> admin = $admin;
    }
}