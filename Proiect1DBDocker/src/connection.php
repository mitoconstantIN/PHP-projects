<?php
$dbms = 'mysql';
$host = 'mysql_db';   
$db = 'pagina';
$user = 'root';      
$pass = 'toor';      
$dsn = "$dbms:host=$host;dbname=$db";
$con = new PDO($dsn, $user, $pass);
?>