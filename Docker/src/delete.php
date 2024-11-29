<?php
require_once 'connection.php';
$sql1 = "DROP PROCEDURE IF EXISTS deleteFlori";
$sql2 = "CREATE PROCEDURE deleteFlori(
    IN strNume varchar(30)
    )
    BEGIN
        DELETE FROM flori WHERE nume=strNume;
    END";
$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$nume = 'trandafiri';
$sql = "CALL deleteFlori('{$nume}')";
$q=$con->query($sql);
if($q)
    echo "Data was succesfully deleted!";
?>
