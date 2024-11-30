<?php
include 'connection.php';
session_start();
if(isset($_COOKIE['username']) && !isset($_SESSION['username']))
{
	$_SESSION['username'] = $_COOKIE['username'];
}
if(isset($_SESSION['username'])){
    $sql="SELECT * FROM clienti WHERE username='{$_SESSION['username']}'";
    $query = $con->query($sql) or die($con->errorInfo());
    $record = $query->fetch(PDO::FETCH_ASSOC);
    $pos=$record['role'];

    echo "Rolul utilizatorului este: " . $pos;
}
?>
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
        <!-- Navigation-->
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.php">Curtea Berarilor</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="about.php">Despre</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Shop</a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="ToateProdusele.php">Toate Produsele</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="ProdusePopulare.php">Produse Populare</a></li>
                                <li><a class="dropdown-item" href="ProduseNoi.php">Produse Noi</a></li>
                            </ul>
                        </li>
                    
                    <?php if(isset($_SESSION['username'])){
                        if($pos=='admin'){
                        echo '<li class="nav-item"><a class="nav-link" href="adminPage.php">Insert Files</a></li>';
                        }
                        echo '</ul>';
                    echo '<a class="btn btn-outline-dark"  href="logout.php">LogOut</a>';}
                    else{
                    echo '<a class="btn btn-outline-dark"  href="loginPage.php">LogIn</a>';} ?>
                        
                    <!--
                     if($loging == 1){
                         echo <a class="btn btn-outline-dark" type="submit" href="logout.php">LogOut</a>';
                                 
                     }
                     else{
                    echo '<a class="btn btn-outline-dark" type="submit" href="loginPage.php">LogIn</a>';
                     }
                    ?>  -->     
                             
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Curtea Berarilor</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Produse noi</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <div align="center">
            
        
            <?php
            $stmt = $con->query("SELECT * FROM clienti");
            //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
             echo "<table border='1'>
            <tr>
            <th>ID</th>
            <th>Utilizator</th>
            <th>Parola</th>
            <th>Pozitie</th>
            <th>Imagine</th>
            <th>Comenzi</th>
            </tr>";

            while($row = $stmt->fetch(PDO::FETCH_ASSOC))
            {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['username'] . "</td>";
            echo "<td>" . $row['password'] . "</td>";
            echo "<td>" . $row['role'] . "</td>";
            echo "<td><img style='width:50px;height:50px;' src='" . $row['image'] . "'></td>";
            echo "<td><a href=\"update.php?id=".$row['id']."\">Update</a>
            <a href=\"delete.php?id=".$row['id']."\">Delete</a>
            <a href=\"insert.php?id=".$row['id']."\">Insert</a></td>";
            echo "</tr>";
            }
            echo "</table>";
            ?>
            <br>
        </div>
        
        
        <br>
        <header >
            <div id="content">
            <form method="post" action="save.php" enctype="multipart/form-data">
                <input type="hidden" name="size" value="1000000">
                <div>
                    <textarea class="form-control" style="width: 50%; margin-left: auto; margin-right: auto;" name="nume"></textarea> 
                </div>
                <div>
                    <input class="form-control" style="width: 50%; margin-left: auto; margin-right: auto;" type="file" name="image"> 
                </div>
                <div>
                    <textarea class="form-control" style="width: 50%; margin-left: auto; margin-right: auto;" name="password"></textarea> 
                </div>
                <div>
                    <input class="form-control" style="width: 50%; margin-left: auto; margin-right: auto;" type="submit" name="upload" value="Upload Image">
                </div>
            </form>
        </div>
        </header>
        <div align="center">
            <br>
             <form action="" method="post">  
            Search: <input type="text" name="term" /><br />  
            <input type="submit" value="Submit" />  
            </form>
            <?php
            if (!empty($_REQUEST['term'])) {

            $term = $_REQUEST['term'];     

            $sql = "SELECT * FROM administrare WHERE username LIKE '%".$term."%'"; 
            $r_query = mysqli_query($con,$sql); 

            while ($row = mysqli_fetch_array($r_query)){  
            echo 'Nume: ' .$row['username'];  
            echo '<br /> Imagine: <img style="width:100px; height:100px;" src='.$row["image"].'>';   
            }  

            }
            ?>
        </div>
        
        <br>
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
