<?php
require_once 'connection.php';

$sql1="DROP TRIGGER IF EXISTS BeforeInsertTrigger";
$sql2= "CREATE TRIGGER BeforeInsertTrigger BEFORE INSERT ON clienti FOR EACH ROW
BEGIN
    SET NEW.username=NEW.username;
END;";

$stmt1=$con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql3="DROP TRIGGER IF EXISTS AfterInsertTrigger";
$sql4= "CREATE TRIGGER AfterInsertTrigger AFTER INSERT ON clienti FOR EACH ROW
BEGIN
INSERT INTO clienti_update(username,status,edtime)VALUES(NEW.username,'INSERTED',NOW());
END;";
$stmt3=$con->prepare($sql3);
$stmt4=$con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();