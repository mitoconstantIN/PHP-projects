<?php
require_once "connection.php";
$msg="";
if(isset($_POST['upload'])){
    $target="./multimedia/".md5(uniqid(time())).basename($_FILES['image']['name']);
    $text=$_POST['nume'];
    $password=$_POST['password'];
    $sql="INSERT INTO administrare (username, password, image) VALUES('$text', '$password','$target')";
    mysqli_query($con, $sql);
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        header('location:adminPage.php');
    }
    else{
        $msg="Vai! Vai! Vai!!!";
    }
}