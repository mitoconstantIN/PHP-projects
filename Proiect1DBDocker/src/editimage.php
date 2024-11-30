<?php
include 'connection.php';
session_start();
if(isset($_COOKIE['username']) && !isset($_SESSION['username']))
{
	$_SESSION['username'] = $_COOKIE['username'];
}
if(isset($_SESSION['username'])){
    $sql="SELECT * FROM administrare WHERE username='{$_SESSION['username']}'";
    $query=mysqli_query($con,$sql) or die(mysqli_query($con));
    $record=mysqli_fetch_array($query);
    $pos=$record['user_type'];
}

if(!isset($_POST['submit'])){
    $sql="SELECT * FROM administrare WHERE ID='{$_GET['id']}'";
    $result=mysqli_query($con, $sql);
    $record=mysqli_fetch_array($result);
}
else{
    $sql2="SELECT * FROM administrare WHERE ID='{$_POST['id']}'";
    $result2=mysqli_query($con, $sql2);
    $rec=mysqli_fetch_array($result2);
    $username=$_POST['username'];
    if(isset($_POST['image'])){
        $target="./multimedia/".basename($_FILES['image']['name']);
    }else{
        $target=$rec['image'];
    }
    $sql1="UPDATE administrare SET nume='{$title}', image='{$target}' WHERE id='{$_POST['id']}'";
    mysqli_query($con,$sql1)or die(mysqli_error($con));
    move_uploaded_file($_FILES['image']['tmp_name'],$target);
    header('Location:adminPage.php');
}
?>
<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" enctype="multipart/form-data">
                    Nume:<input class="form-control" style="width: 50%; margin-left: auto; margin-right: auto;" type="text" name="nume" value="<?php echo $record['nume'];?>"><br/>
                    Image:<input class="form-control" style="width: 50%; margin-left: auto; margin-right: auto;" type="file" name="image" value="<?php echo $record['image'];?>"><br/>
                    <img style="width:50px; height:50px;" src="<?php echo $record['imagine'];?>"><br/>
                    <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
                    <input type="Submit" name="submit" value="Submit" class="btn btn-primary btn-outline">
                    </form>