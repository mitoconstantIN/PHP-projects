<?php
$dbms = 'mysql';
$host = 'mysql_db';
$db = 'flowers';
$user = 'root';
$pass = 'toor';
$dsn = "$dbms:host=$host;dbname=$db";
$con = new PDO($dsn, $user, $pass);