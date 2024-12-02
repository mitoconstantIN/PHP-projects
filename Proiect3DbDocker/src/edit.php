<?php
if(isset($_POST['submit'])){
    $id=$_POST['id'];
    $data=simplexml_load_file('data.xml');
    foreach($data->date as $date){
        if($date->id==$id){
            $date->username=$_POST['username'];
            $date->password=$_POST['password'];
            $date->role=$_POST['role'];
            if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
                $image_name = $_FILES['image']['name'];
                $image_tmp = $_FILES['image']['tmp_name'];
                // Mută imaginea încărcată în directorul destinatie
                move_uploaded_file($image_tmp, "uploads/$image_name");
                $date->image = $image_name;
            }
        }
    }
    $handle=fopen("data.xml","wb");
    fwrite($handle,$data->asXML());
    fclose($handle);
    header('location:adminPage.php');
}
?>
<?php
$id=$_GET['id'];
$data=simplexml_load_file('data.xml');
foreach($data->date as $date){
    if($date->id==$id){
?>
<form method="post" enctype="multipart/form-data">
    <input type = "hidden" name = "id" value="<?php echo $date->id; ?>">
    Username: <br>
    <input type = "text" name = "username" value="<?php echo $date->username; ?>"> <br><br>
    Password: <br>
    <input type = "text" name = "password" value="<?php echo $date->password; ?>"> <br><br>
    Role: <br>
    <input type = "text" name = "role" value="<?php echo $date->role; ?>"> <br><br>
    Image: <br>
    <input type = "file" name = "image"><br><br>

    <input type ="submit" name="submit" value="Update">
</form>
<?php 
    }
}
?>
