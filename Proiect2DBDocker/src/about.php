<?php
include 'connection.php';
session_start();
if(isset($_COOKIE['username']) && !isset($_SESSION['username']))
{
	$_SESSION['username'] = $_COOKIE['username'];
}
if(isset($_SESSION['username'])){
    $sql="SELECT * FROM clienti WHERE username='{$_SESSION['username']}'";
    $query=mysqli_query($con,$sql) or die(mysqli_query($con));
    $record=mysqli_fetch_array($query);
    $pos=$record['role'];
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
        <<nav class="navbar navbar-expand-lg navbar-light bg-light">
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
                    <p class="lead fw-normal text-white-50 mb-0">Despre noi</p>
                </div>
            </div>
        </header>


<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");
ctx.font = "30px Arial";
ctx.fillText("Povestea:",10,50);
</script>
<div style="background-image: url('multimedia/curtea berarilor_01.jpg');" >
        <div class="lead fw-normal text-red mb-0" class="text-center" style="color:white;" > 
        A fost odata ca niciodata, nici prea demult, nici prea curand, prin timpul lui 2007, un loc anume creat pentru a deveni insemnat. La timpul acela, voia buna umbla nestingherita prin oras si nu-si gasea locul potrivit.

Pana cand, intr-o zi cu soare, dintr-o curte de sticlari priceputi, rasari din spuma unei halbe cu bere rece, un loc strasnic in infatisare, in atmosfera si in gustare.

La vremea aceea, Curtea Berarilor isi deschidea portile si, o data ajunsa aici, voia buna gasi de cuviinta sa ramana a locului.

In respectabila ei traditie, Curtea Berarilor reimprospateaza vremile de altadata pentru bunii oameni de azi. Intrati, inhatati meniul si puneti-va pe simtit bine caci ati ajuns in cel mai potrivit loc!

Principiile Curtii sunt clare si sanatoase: Pofta de viata se tine cu bere la halba si bucate alese.

Aici e rost de pus veselia la cale,loc de lasat deoparte zarva de afara. Aici timpul curge altfel. Caci atunci cand sorbi bere de soi alaturi de prieteni si mananci ca un boier, vorba devine ras si poveste care se scrie de la sine.
        </div>
        <br><br><br>
        <p class="lead fw-normal text-red mb-0" class="text-center"  style="color:white;"> Unde ne gasiti? Mai jos aveti locatia:<p>
        <div align="center">
       <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2712.1571899625906!2d27.568929076167773!3d47.17435887115342!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sUniversitatea%20%E2%80%9EAlexandru%20Ioan%20Cuza%E2%80%9D!5e0!3m2!1sro!2sro!4v1684851570345!5m2!1sro!2sro"  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
       <br><br>
        </div>
       </div>
<div style="background-image: url('multimedia/clienti_multumiti.jpg');">
       <div class="lead fw-normal text-red mb-0" class="text-center" style="color:white;" > Videoclipuri si recenzii:</div>
       <br><br>
       <div class="lead fw-normal text-red mb-0" class="text-center"  style="color:white;"> Cristina Gheorghita:
           "Am avut o experiență minunată la Curtea Berarilor! Atmosfera a fost plăcută și relaxantă, iar personalul a fost extrem de amabil și prompt în a ne servi. Mâncarea a fost delicioasă și variată, iar berea artizanală a fost cu adevărat remarcabilă. 
           Recomand cu căldură acest loc tuturor celor care își doresc să petreacă o seară plăcută într-o ambianță prietenoasă și să se bucure de
           preparate culinare de calitate."</div><br>
       <div class="lead fw-normal text-red mb-0" class="text-center"  style="color:white;">
           
    Catalin Rapeanu:
    "Am fost la Curtea Berarilor într-o seară de weekend și am fost impresionat de serviciile lor impecabile. Personalul a fost foarte atent și ne-a 
    oferit sfaturi utile cu privire la selecția de bere. Am încercat mai multe sortimente și fiecare a avut un gust distinct și autentic. 
    Mâncarea a fost de asemenea excelentă, cu o varietate de preparate tradiționale și moderne. Cu siguranță voi reveni aici pentru a explora 
    mai multe din selecția lor extinsă de bere artizanală."
    <br>
<br>
    Silvia Stoian:
    "Curtea Berarilor este un loc fantastic pentru iubitorii de bere! Am petrecut o seară minunată acolo alături de prieteni. 
    Berea artizanală pe care am degustat-o a fost cu adevărat excepțională, cu arome și gusturi complexe. Meniul era bogat și variat, 
    oferind opțiuni delicioase pentru toate gusturile. Personalul a fost amabil și bine informat, oferindu-ne detalii despre fiecare sortiment de 
    bere pe care am dorit să-l încercăm. Este cu siguranță un loc în care voi reveni cu plăcere în viitor!"<br><br>
       </div>
       <br><br>
       <div align ="center">
       <audio controls>
           <source src="multimedia/traiascaberea.mp3" type="audio/mpeg">
       </audio>
       <br><br>
       </div>
       
</div>
<div align='center'>
       <video controls>
           <source src="multimedia/berarie_cu_catalin.mp4" type="video/mp4">
       </video>
</div>
       <canvas id="myCanvas" width="800" height="100" style="border:1px solid #d3d3d3;">
Your browser does not support the HTML canvas tag.</canvas>

<script>
var c = document.getElementById("myCanvas");
var ctx = c.getContext("2d");

// Create gradient
var grd = ctx.createRadialGradient(75,50,5,90,60,100);
grd.addColorStop(0,"black");
grd.addColorStop(1,"white");

// Fill with gradient
ctx.fillStyle = grd;
ctx.fillRect(10,10,800,80);
</script>
       
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

