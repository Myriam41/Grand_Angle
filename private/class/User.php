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
        $this-> identifiant = $code;
    }
    public function setidentifiant($identifiant) {
        $this-> identifiant = $identifiant;
    }
    public function setpass($pass) {
        $this-> identifiant = $pass;
    }
    public function setadmin($admin) {
        $this-> admin = $admin;
    }
}