<?php
include 'connection.php';
include 'clase.php';
session_start();

$query = new MongoDB\Driver\Query([]);
$rows = $client->executeQuery("pagina.clienti", $query);

if(isset($_COOKIE['username']) && !isset($_SESSION['username']))
{
    $_SESSION['username'] = $_COOKIE['username'];
}

if(isset($_SESSION['username'])){
    $filter = ['username' => $_SESSION['username']];
    $query = new MongoDB\Driver\Query($filter);
    $rows = $client->executeQuery("clienti.clienti", $query);

    // Convertim rezultatul într-un array asociativ
    $record = current($rows->toArray());

    $pos = $record->role;
}


//$stmt1 = $client->prepare($sql1);
//$stmt2 = $client->prepare($sql2);
//$stmt1->execute();
//$stmt2->execute();

//$sql = 'CALL GetUser()';
//$q = $client->query($sql);
//$q->setFetchMode(PDO::FETCH_ASSOC);
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        
         <style>
        .social-buttons {
            display: flex;
            justify-content: center;
            margin: 20px;
        }
        .social-buttons button {
            margin: 0 10px;
        }
    </style>
        
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
                    <li>    <input type="text" name="search" placeholder="Search.."> </li>        
                </div>
            </div>
        </nav>
        <!-- Header-->
        <header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Curtea Berarilor</h1>
                    <p class="lead fw-normal text-white-50 mb-0">Locul in care poti savura linistit berea cu prietenii</p>
                </div>
            </div>
        </header>
        <br><br>
        <p align = "center" style="background-image: url('multimedia/curtea_berarilor.jpg');"> <iframe width="560" height="315" src="https://www.youtube.com/embed/gjDoxMvSezI" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    </p>
        <div style="background-image: url('multimedia/sala-mare.jpg');" class="lead fw-normal text-red mb-0">
            <br><h2 style="color:white;" >Povestea:</h2>
            <div width="50" height="300" style="color:white;">A fost odata ca niciodata, nici prea demult, nici prea curand, prin timpul lui 2007, un loc anume creat pentru a deveni insemnat. La timpul acela, voia buna umbla nestingherita prin oras si nu-si gasea locul potrivit.
            Pana cand, intr-o zi cu soare, dintr-o curte de sticlari priceputi, rasari din spuma unei halbe cu bere rece, un loc strasnic in infatisare, in atmosfera si in gustare.</div>
            <br><h4 style="color:white;"> Timi la Tank:</h4>
            <p style="color:white;">Noi ii spunem „Timi la tank”, specialistii ii spun Timisoreana Nepasteurizata dar de
            fapt este unul si acelasi lucru. O licoare absolut geniala, foarte proaspata (are termen
            de garantie de 14 zile), livrata direct din fabrica (livrarea se face in a 2-a zi dupa ce a fost pr
            odusa) si care vine in tank-uri speciale.</p>
            <br><br>
        </div>
        <br>
        <?php 
        $clientFidel1 = new clienti_fideli(); 
        $clientFidel2 = new clienti_fideli(); 
        
        $clientFidel1->setNume('Rapeanu');
        $clientFidel2->setNume('Vasile');
        
        $clientFidel1->setPrenume('Catalin');
        $clientFidel2->setPrenume('Vasile');
        ?>
        
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-black">
                <h4 class="display-4 fw-bolder">Clineti fideli</h4>
            </div>
        </div>
        <div class="container" style="margin-left: 120px;">
        <table border="1" style="position: relative;
                            bottom:0;
                            z-index: 2;
                            left: 50%;
                            top: 50%;
                            transform: translate(-50%,-50%);
                            width: 60%; 
                            border-collapse: collapse;
                            border-spacing: 0;
                            box-shadow: 0 2px 15px rgba(64,64,64,.7);
                            border-radius: 12px 12px 0 0;
                            overflow: hidden;">
            <tr>
                <th>Nume</th>
                <th>Prenume</th>
            </tr>
            <tr>
                <td><?php $clientFidel1->afisareNume(); ?></td>
                <td><?php $clientFidel1->afisarePrenume(); ?></td>
            </tr>
            <tr>
                <td><?php $clientFidel2->afisareNume(); ?></td>
                <td><?php $clientFidel2->afisarePrenume(); ?></td>
            </tr>
        </table>
        </div>
        <br>
       
        <br>
        <div align = "center">
            <h2>Aprinde becul pentru a comanda o bere!</h2>

<script>
function light(sw) {
  var pic;
  if (sw == 0) {
    pic = "multimedia/pic_bulboff.gif"
  } else {
    pic = "multimedia/pic_bulbon.gif"
  }
  document.getElementById('myImage').src = pic;
}
</script>

<img id="myImage" src="multimedia/pic_bulboff.gif" width="100" height="180">

<p>
    <button type="button" onclick="light(1)" ><a href="ToateProdusele.php">Light On</a></button>
<button type="button" onclick="light(0)">Light Off</button>
</p>
<h5>Sau apasa pe buton pentru a primi o bere gratuit!</h5>
<p id="demo">Apasa mai jos.</p>
<button type="button" onclick="myFunction()">Click Me!</button>
</div>
<script>
function myFunction() { 
  document.getElementById("demo").innerHTML = "Berea va ajunge imediat!";
}
</script>
<br><br><br>
<div class="social-buttons">
        <!-- Butonul Facebook Like -->
        <div class="fb-like" data-href="https://www.example.com" data-width="" data-layout="button_count" data-action="like" data-size="small" data-share="false"></div>

        <!-- Butonul Twitter Share -->
        <a class="twitter-share-button" href="https://twitter.com/intent/tweet?url=https%3A%2F%2Fwww.example.com&amp;text=Verifică această pagină interesantă!" data-size="small">Tweet</a>

        <!-- Butonul LinkedIn Share -->
        <script src="https://platform.linkedin.com/in.js" type="text/javascript">lang: en_US</script>
        <script type="IN/Share" data-url="https://www.example.com" data-counter="right"></script>
    </div>

    <!-- Adaugă scripturile necesare pentru butoanele de social media -->
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v11.0" nonce="Vg7B1L0K"></script>
    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                    
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
