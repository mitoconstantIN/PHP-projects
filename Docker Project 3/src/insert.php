<?php
require_once 'connection.php';
try{
    $dbh = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    echo 'Conected to databas<br/>';

    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $dbh->beginTransaction();

    $dbh->exec("INSERT INTO flori (nume, culoare, marime, pret) VALUES ('lalele', 'albe', 'medii', '10')");
    $dbh->exec("INSERT INTO flori (nume, culoare, marime, pret) VALUES ('trandafiri', 'rosii', 'mari', '75')");
    $dbh->exec("INSERT INTO flori (nume, culoare, marime, pret) VALUES ('crizanteme', 'galbene', 'medii', '5')");
    $dbh->exec("INSERT INTO flori (nume, culoare, marime, pret) VALUES ('petunii', 'albastre', 'mari', '90')");
    $dbh->commit();
    echo 'Data entered successfully<br />';

}
catch(PDOException $e)
{
    $dbh->rollback();
    echo $e->getMessage();
}
?>