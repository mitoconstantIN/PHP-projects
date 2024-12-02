<?php
$id=$_POST['id'];
$username=$_POST['username'];
$password=$_POST['password'];
$role=$_POST['role'];
$image=$_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];

$xml=simplexml_load_file('data.xml');
$date=$xml->addChild('date');
$date->addChild('id',$id);
$date->addChild('username',$username);
$date->addChild('password',$password);
$date->addChild('role',$role);
$date->addChild('image',$image);
$date->addChild('view','view.php?id='.$id);
$date->addChild('edit','edit.php?id='.$id);
$date->addChild('delete','delete.php?id='.$id);
$date->addChild('confirm','return confirm("Are you sure you want to delete this item?")');
$date->addChild('back','adminPage.php');

move_uploaded_file($image_tmp, "uploads/$image");

file_put_contents('data.xml', $xml->asXML());
header('location:adminPage.php');
?>