<?php
require_once 'connection.php';
require_once 'update_trigger.php';
//modifica numele culoarea si marimea dupa pret
$sql1="DROP PROCEDURE IF EXISTS UpdateFlori";
$sql2="CREATE PROCEDURE updateFlori(
    IN strNume varchar(80),
    IN strCuloare varchar(80),
    IN strMarime varchar(80),
    IN intPret int
    )
    BEGIN 
    UPDATE flori SET nume=strNume, culoare=strCuloare,
    marime=strMarime WHERE pret=intPret;
    END";
$stmt1 = $con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$nume = 'trandafiri';
$culoare = 'roz';
$marime = 'mari';
$pret = '75';
$sql =  "CALL updateFlori('{$nume}','{$culoare}','{$marime}','{$pret}')";
$q = $con->query($sql);
if($q)
echo "Data was succesfully updated!";
?>
<br/><a href="index.php">Back</a>
