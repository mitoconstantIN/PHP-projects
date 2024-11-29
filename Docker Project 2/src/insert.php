<?php
require_once 'connection.php';
require_once 'insert_trigger.php';

$sql1 = "DROP PROCEDURE IF EXISTS insertFlori";
$sql2 = "CREATE PROCEDURE insertFlori(
    IN strNume varchar(50),
    IN strCuloare varchar(50),
    IN strMarime varchar(50),
    IN intPret int
    )
    BEGIN 
    INSERT INTO flori
    (nume, culoare, marime, pret)
    VALUES (strNume, strCuloare, strMarime, intPret);
    END";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$nume = 'crizanteme';
$culoare = 'albe';
$marime = 'mari';
$pret = '75';
$sql = "CALL insertFlori('{$nume}', '{$culoare}', '{$marime}', '{$pret}')";
$q = $con->query($sql);
if($q)
    echo "Data was successfullt inserted!";
?>
<br/><a href="index.php">Back</a>