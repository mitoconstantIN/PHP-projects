<?php 
require_once 'connection.php';
$bulk = new MongoDB\Driver\BulkWrite;



if(!isset($_POST["submit"])){
    $id = new \MongoDB\BSON\ObjectId($_GET['id']);
    $filter = ['_id' => $id];
    $query = new MongoDB\Driver\Query($filter);
    $article = $client->executeQuery("pagina.clienti", $query);
    $doc = current($article->toArray());
}
else{
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
    
    $fileNameNew = uniqid('', true) . "." . $fileActualExt;
                
    // Destinația în care va fi salvat fișierul
    $fileDestination = 'uploads/' . $fileNameNew;
    
    // Mutăm fișierul din locația temporară în destinația finală
    move_uploaded_file($fileTmpName, $fileDestination);;
    $data=[
        'username'=>$_POST['username'],
        'password'=>$_POST['password'],
        'role'=>$_POST['role'],
        'image'=>$fileDestination,
    ];
    $id = new \MongoDB\BSON\ObjectId($_POST['id']);
    $filter = ['_id'=>$id];

    $update = ['$set'=>$data];

    $bulk->update($filter, $update);
    $client->executeBulkWrite('pagina.clienti',$bulk);
    header('location:adminPage.php');
}
?>
<h1>Editati inregistrarea</h1>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $doc->_id;?>">
    Username:<br><input type="text" name="username" value="<?php echo $doc->username;?>"><br/>
    Password:<br><input type="text" name="password" value="<?php echo $doc->password;?>"><br/>
    Role:<br><input type="text" name="role" value="<?php echo $doc->role;?>"><br/>
    Image: <br><input type="file" name="image"><br/>
    <img src="<?php echo $doc->image;?>" width="100"  height="100">
    <input type="submit" name="submit" value="Update"><br>
</form>