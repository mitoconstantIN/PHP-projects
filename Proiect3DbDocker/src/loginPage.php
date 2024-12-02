<?php
session_start();

if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
} else {
    $username = "";
    $password ="";
}

if (isset($_REQUEST['login'])) {
    $user = $_REQUEST['username'];
    $pass = $_REQUEST['password'];

    // Citirea datelor din fișierul XML
    $xml = simplexml_load_file('data.xml');

    foreach ($xml->date as $userData) {
        if ($userData->username == $user && $userData->password == $pass) {
            $_SESSION['username'] = (string)$userData->username;
            $_SESSION['ADMIN'] = (string)$userData->role;

            if (isset($_REQUEST['rememberme'])) {
                setcookie('username', $_REQUEST['username'], time() + 3600); // 1 hour
                setcookie('password', $_REQUEST['password'], time() + 3600); // 1 hour
            } else {
                setcookie('username', $_REQUEST['username'], time() - 10); // 10 seconds
                setcookie('password', $_REQUEST['password'], time() - 10); // 10 seconds
            }

            header('location:index.php');
            exit; // Oprirea executării scriptului după redirecționare
        }
    }

    $msg = "Introduceti date valide.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body{
            background-image: url('multimedia/curtea_berarilor.jpg');
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">
    <title>Login</title>
</head>
<body>
<main>
    <form method="post">
        <h1>Login</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        Remember Me: <input type="checkbox" name="rememberme"><br/>
        Nu ai un cont creat? Apasa <a href="registerPage.php">aici</a>
        <input type="submit" name="login" value="Login!">
    </form>
</main>
</body>
</html>