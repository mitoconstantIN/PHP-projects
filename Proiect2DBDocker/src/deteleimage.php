<?php
include 'connection.php';
$sql1="SELECT * FROM administrare WHERE id='{$_GET['id']}'";
$query=mysqli_query($con, $sql1)or die(mysqli_error($con));
$row=mysqli_fetch_array($query);
unlink($row["imagine"]);
$sql2="DELETE FROM administrare WHERE id='{$_GET['id']}'";
$query=mysqli_query($con, $sql2)or die(mysqli_error($con));
header('location:adminPage.php');
?>