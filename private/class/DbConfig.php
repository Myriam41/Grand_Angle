<?php
class DbConfig {

    protected $serverName;
    protected $userName;
    protected $pass;
    protected $dbName;

    function dbMySQL() {
        $this -> serverName = 'localhost';
        $this -> userName = 'root';
        $this -> pass = '';
        $this -> dbName = 'Grand_Angle2';
    }

    function dbPostgre() {
        $this -> serverName = 'localhost';
        $this -> userName = 'postgres';
        $this -> pass = 'mathieu';
        $this -> dbName = 'Grand_Angle';
    }
}