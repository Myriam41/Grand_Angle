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
    public function getidentifiant() {
        return $this->identifiant;
    }
    public function getpass() {
        return $this->pass;
    }
    public function getadmin() {
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
        $this-> password = $pass;
    }
    public function setAdmin($admin) {
        $this-> admin = $admin;
    }
}