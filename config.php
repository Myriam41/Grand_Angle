<?php
// Connect with MySQL
    define('__HOST__', 'localhost');
    define('__USER__', 'root');
    define('__PASS__', '');
    define('__DBNAME__','grand_angle2');

    $lk = mysqli_connect(__HOST__, __USER__, __PASS__, __DBNAME__ ) or die("Erreur");

// Connect with Postgres

    $host = 'localhost';
    $user = 'postgres';
    $pass = 'PJRV0tel!S:121';
    $base = 'grandAngle';

    $pg = pg_connect("host=$host port=5432 user=$user password=$pass dbname=$base");

    