<?php
session_start();
$status=0;
include 'connection.php';
if(isset($_POST['register'])){
    $nume=$_POST['username'];
    $pass=$_POST['password'];
    $role='user';

    $filter = ['username' => $nume];
    $query=new MongoDB\Driver\Query($filter);
    $result=$client->executeQuery("pagina.clienti", $query);
    if(current($result->toArray())){
        $status=1;
    }
    if($status==0){
        if($nume!=NULL && $pass!=NULL){
            $bulk = new MongoDB\Driver\BulkWrite;
            $document = ['username' => $nume, 'password' => $pass, 'role' => $role];
            $bulk->insert($document);
            
            $result = $client->executeBulkWrite('pagina.clienti', $bulk);

            if($result->getInsertedCount() > 0){
                //echo '<script type="text/javascript">alert("New Account created. Please log in!")</script>';
                header('location:loginPage.php');
            }
            else{
                echo "Error: Unable to register user.";
            }
        }
        else{
            //echo '<script type="text/javascript">alert("introdu valori")</script>';
            header('location:registerPage.php');
        }
    }
    else {
        echo "Error: Username already exists.";
    }
}
?>