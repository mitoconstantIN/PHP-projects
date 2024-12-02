<?php
require_once 'connection.php';

// Verificăm dacă s-a făcut o încărcare de fișier
if(isset($_POST['upload'])) {
    // Detalii despre fișier
    $file = $_FILES['image'];
    
    // Detalii despre utilizator
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    
    // Informații despre fișier
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];
    $fileType = $file['type'];
    
    // Separăm extensia fișierului
    $fileExt = explode('.', $fileName);
    $fileActualExt = strtolower(end($fileExt));
    
    // Extensiile de fișiere permise
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    
    // Verificăm dacă extensia fișierului este permisă
    if(in_array($fileActualExt, $allowed)) {
        // Verificăm dacă au apărut erori la încărcare
        if($fileError === 0) {
            // Verificăm dacă dimensiunea fișierului este în limitele acceptate
            if($fileSize < 10000000) { // 10 MB (în bytes)
                // Generăm un nume unic pentru fișier
                $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                
                // Destinația în care va fi salvat fișierul
                $fileDestination = 'uploads/' . $fileNameNew;
                
                // Mutăm fișierul din locația temporară în destinația finală
                move_uploaded_file($fileTmpName, $fileDestination);
                
                // Salvăm detaliile utilizatorului și calea fișierului în baza de date
                $document = [
                    'username' => $username,
                    'password' => $password,
                    'role' => $role,
                    'image' => $fileDestination
                ];
                
                // Creăm o operațiune de inserare
                $bulk = new MongoDB\Driver\BulkWrite;
                $bulk->insert($document);
                
                // Executăm operațiunea de inserare
                $client->executeBulkWrite('pagina.clienti', $bulk);
                
                // Redirecționăm utilizatorul înapoi către formular
                header("Location: adminPage.php");
            } else {
                echo "Fișierul este prea mare!";
            }
        } else {
            echo "Eroare la încărcarea fișierului!";
        }
    } else {
        echo "Nu puteți încărca fișiere de acest tip!";
    }
}
?>
