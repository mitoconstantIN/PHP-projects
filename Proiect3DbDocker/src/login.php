<?php
$user='111';
$pass='222';
if((isset($_POST['username']))&&(isset($_POST['password']))){
    if(($_POST['username'] == $user)&&($_POST['password']==$pass)){
        if(isset($_POST['rememberme'])){
            setcookie('username', $_POST['username'], time()+60*60*24*365);
            setcookie('password', md5($_POST['password']), time()+60*60*24*365);
            echo "Remember me cookie set!";}else{
                setcookie('username', $_POST['username'], false);
                setcookie('password', md5($_POST['password']), false);
                echo "Remember me cookie not set!";
        }
        header('Location: index.php');
    }else{
        echo 'Username/Password Invalid';
    }
}else{
    echo 'You must supply a username and password.';
}
?>
