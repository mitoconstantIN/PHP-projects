<?php
session_start();
$status=0;
include 'connection.php';
if(isset($_POST['register'])){
    $nume=$_POST['username'];
    $pass=$_POST['password'];
    $role='user';
    $query="SELECT * FROM clienti WHERE username='{$nume}'";
    $result=mysqli_query($con,$query);
    if($result->num_rows>0){
        $status=1;
    }
    if($status==0){
        if($nume!=NULL && $pass!=NULL){
            $query="INSERT INTO clienti (username, password, role,image) VALUES ('$nume','$pass','$role', 'img')";
            
            if(mysqli_query($con,$query)){
                //echo '<script type="text/javascript">alert("New Account created. Please log in!")</script>';
                header('location:loginPage.php');
            }
            else{
                echo "Error: ".$query."<br>".mysqli_error($con);
            }
        }
        else{
            //echo '<script type="text/javascript">alert("introdu valori")</script>';
            header('location:registerPage.php');
        }
    }
}
?>