<?php
require_once 'connection.php';
$sql1 = "DROP TRIGGER IF EXISTS BeforeDeleteTrigger";
$sql2 = "CREATE TRIGGER BeforeDeleteTrigger BEFORE DELETE ON clienti FOR EACH ROW
BEGIN
INSERT INTO clienti_update(username, status,edtime)VALUES(OLD.username,'DELETED',NOW());
END;";
$stmt1 = $con ->prepare($sql1);
$stmt2 = $con ->prepare($sql2);
$stmt1 -> execute();
$stmt2->execute();