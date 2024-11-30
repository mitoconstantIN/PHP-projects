<?php
require_once 'connection.php';
require_once 'insert_trigger.php';

$sql = "
CREATE PROCEDURE insertUser(
    IN p_username VARCHAR(255),
    IN p_password VARCHAR(255),
    IN p_role VARCHAR(50),
    IN p_image VARCHAR(255)
)
BEGIN
    INSERT INTO clienti (username, password, role, image) VALUES (p_username, p_password, p_role, p_image);
END";

try {
    // Preparam și executăm comanda SQL
    $stmt = $con->prepare($sql);
    $stmt->execute();
    
    echo "Procedura stocată insertUser a fost creată cu succes!";
} catch (PDOException $e) {
    // Gestionăm eventualele erori
    //echo "Eroare la crearea procedurii stocate: " . $e->getMessage();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name']; 
        $image_dest = 'destinatie/' . $image_name; 


       // move_uploaded_file($image_tmp, $image_dest);
    } else {

        $image_dest = null;
       
    }

    $sql = "CALL insertUser(:username, :password, :role, :image)";
    $stmt = $con->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);
    $stmt->bindParam(':role', $role, PDO::PARAM_STR);
    $stmt->bindParam(':image', $image_dest, PDO::PARAM_STR);
    $stmt->execute();

    echo "Data was successfully inserted!";
    echo '<br/><a href="adminPage.php">Back</a>';
} else {
    include 'add_user_form.php';
}
?>
