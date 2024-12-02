<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Curtea Berarilor</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
<?php
 include "connection.php";
        if(!isset($_POST["submit"])){
            $sql="SELECT * FROM administrare WHERE id= '{$_GET['id']}'";
            $result=mysqli_query($con, $sql);
            $record=mysqli_fetch_array($result);

        }
        else{
            $sql1="UPDATE administrare SET username='{$_POST['username']}', password='{$_POST['password']}',image='{$_POST['image']}', role='{$_POST['role']}' WHERE id='{$_POST['id']}'";

            mysqli_query($con,$sql1) or die (mysqli_error($con));
            header('Location:adminPage.php');

        }
        ?>
<div style="display: flex; justify-content: center; flex-direction: column; align-items: center; margin-top: 100px; margin-left: 100px;">                                   
             <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
             Nume: <br> <input class="form-control" type="text" name="username" value="<?php echo $record['username']; ?>"><br>
             Parola: <br> <input class="form-control" type="text" name="password" value="<?php echo $record['password']; ?>"><br>
             Imagine: <br> <input class="form-control" type="file" name="image" value="<?php echo $record['image']; ?>"><br>
             <input type="hidden" name="id" value="<?php echo $record['id']; ?>">
             <input type="Submit" name="submit" value="Submit" class="btn btn-primary btn-outline">
             </form>
        </div>
        </body>
</html>