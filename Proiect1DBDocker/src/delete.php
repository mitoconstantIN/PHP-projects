<?php
require_once 'connection.php';
require_once 'delete_trigger.php';

$sql1 = "DROP PROCEDURE IF EXISTS deleteUser";
$sql2 = "
CREATE PROCEDURE deleteUser(IN userId INT)
BEGIN
    DELETE FROM clienti WHERE id = userId;
END";

try {
    // Executarea instrucțiunii SQL pentru ștergerea procedurii stocate existente (dacă există)
    $stmt1 = $con->prepare($sql1);
    $stmt1->execute();

    // Executarea instrucțiunii SQL pentru crearea procedurii stocate deleteUser
    $stmt2 = $con->prepare($sql2);
    $stmt2->execute();

    echo "Procedura stocată deleteUser a fost creată cu succes!";
} catch (PDOException $e) {
    // Gestionarea erorilor în cazul în care crearea procedurii stocate a eșuat
    echo "Eroare la crearea procedurii stocate: " . $e->getMessage();
}

if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];


    $sql = "CALL deleteUser(:id)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();


    header('Location: adminPage.php');
    exit();
} else {

    echo "Invalid ID!";
}
?>
