<?php
if(isset($_FILES['file'])) {
    $uploadDirectory = 'uploads/'; 

    $uploadedFiles = $_FILES['file'];


    if($uploadedFiles['error'] === UPLOAD_ERR_OK) {
        $tempName = $uploadedFiles['tmp_name'];
        $originalName = $uploadedFiles['name'];

        // Mutăm fișierul încărcat în directorul specificat
        move_uploaded_file($tempName, $uploadDirectory . $originalName);

        echo 'Fișierul a fost încărcat cu succes!';
    } else {
        echo 'A apărut o eroare la încărcarea fișierului.';
    }
}
?>