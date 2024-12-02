<?php
//include 'connection.php';
session_start();

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
                    
                        <?php
                        $userRole = "";

                        if (isset($_SESSION['username'])) {
                            // Citim rolul utilizatorului din fișierul XML
                            $xml = simplexml_load_file('data.xml');

                            foreach ($xml->date as $userData) {
                                if ((string)$userData->username == $_SESSION['username']) {
                                    $userRole = (string)$userData->role;
                                    break; // Odată ce am găsit rolul utilizatorului, nu mai este nevoie să continuăm căutarea
                                }
                            }
                        }




                        if(isset($_SESSION['username'])){
                            if($userRole == 'admin'){ // Verificăm rolul utilizatorului
                                echo '<li class="nav-item"><a class="nav-link" href="adminPage.php">Insert Files</a></li>';
                            }
                            echo '</ul>';
                            echo '<a class="btn btn-outline-dark"  href="logout.php">LogOut</a>';
                        } else {
                            echo '<a class="btn btn-outline-dark"  href="loginPage.php">LogIn</a>';
                        } 
                        ?>     
                             
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
            
            $xslDoc = new DOMDocument();
            $xslDoc->load("data.xsl");
        
            $xmlDoc=new DOMDocument();
            $xmlDoc->load("data.xml");
            
            $proc=new XSLTProcessor();
            $proc->importStylesheet($xslDoc);
            echo $proc->transformToXml($xmlDoc);
            //$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            ?>
            <a href="insert.php">Add new record</a>
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
