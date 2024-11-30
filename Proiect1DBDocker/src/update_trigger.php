<?php
require_once 'connection.php';
$sql1 = "DROP TRIGGER IF EXISTS BeforeUpdateTrigger";
$sql2 = "CREATE TRIGGER BeforeUpdateTrigger BEFORE UPDATE ON clienti FOR EACH ROW
BEGIN 
    SET NEW.username=NEW.username;
END;";
$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1 -> execute();
$stmt2 -> execute();

$sql3 = "DROP TRIGGER IF EXISTS AfterUpdateTrigger";
$sql4 = "CREATE TRIGGER AfterUpdateTrigger AFTER UPDATE ON clienti FOR EACH ROW
BEGIN
INSERT INTO clienti_update(username, status, edtime)VALUES(NEW.username,'UPDATED', NOW());
END;";
$stmt3 = $con->prepare($sql3);
$stmt4 = $con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();