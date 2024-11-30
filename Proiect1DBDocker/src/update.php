<?php
require_once 'connection.php';
require_once 'update_trigger.php';
//modifica numele culoarea si marimea dupa pret
$sql1="DROP PROCEDURE IF EXISTS UpdateUser";
$sql2="CREATE PROCEDURE updateUser(
    IN intPret int,
    IN strNume varchar(80),
    IN strParola varchar(80),
    IN strRol varchar(80),
    IN strImg varchar(80)
    )
    BEGIN 
    UPDATE clienti SET username= strNume, password=strParola, role=strRol,
    image=strImg WHERE id=intPret;
    END";
$stmt1 = $con->prepare($sql1);
$stmt2=$con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
//if(isset($_GET['id']) && !empty($_GET['id'])){
$id = $_POST['userId'];
//
$username = $_POST['username'];
//'dirijorul';
//
$password = $_POST['password'];
//'dir';
//
$role= $_POST['role'];
//'rol';
//
//if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
//    $image = $_FILES['image']['tmp_name']; // Numele temporar al fișierului încărcat
//} else {
//    $image = null; // Setează imaginea la null dacă nu a fost încărcată sau a generat erori
//}

if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $image_name = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name']; 
    $image_dest = 'destinatie/' . $image_name; 


   // move_uploaded_file($image_tmp, $image_dest);
} else {

    $image_dest = null;
   
}
$sql =  "CALL updateUser('{$id}','{$username}','{$password}','{$role}','{$image_dest}')";
$q = $con->query($sql);
if($q)
echo "Data was succesfully updated!";
echo '<br/><a href="adminPage.php">Back</a>';



//else{
  //  include 'update_form.php';
//}
//}else {
  //  echo "Invalid ID!";
 //} // Dacă nu s-a transmis un ID valid, afișăm un mesaj de eroare
}
else{
    include 'update_form.php';
} 

?>
<br/><a href="adminPage.php">Back</a>