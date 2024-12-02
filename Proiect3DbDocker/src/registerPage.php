<!DOCTYPE html>
<html lang="en">
<head>
        <style>
        body{
            background-image: url('multimedia/curtea_berarilor.jpg');
        }
        .captcha {
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-family: Arial, sans-serif;
        }
        .captcha-img {
            margin-right: 10px;
        }
        .captcha-refresh {
            cursor: pointer;
            text-decoration: underline;
            margin-left: 5px;
            font-size: 15px;
        }
    </style>
    <script>
        function generateCaptcha() {
            var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
            var captcha = '';
            for (var i = 0; i < 6; i++) {
                captcha += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            document.getElementById('captcha-text').textContent = captcha;
        }
        function refreshCaptcha() {
            generateCaptcha();
        }
        function validateCaptcha() {
            var userCaptcha = document.getElementById('user-captcha').value;
            var generatedCaptcha = document.getElementById('captcha-text').textContent;
            if (userCaptcha === generatedCaptcha) {
                alert('Captcha corect!');

                // Aici poți adăuga codul pentru acțiunea dorită după validarea CAPTCHA-ului

            } else {
                alert('Captcha incorect!');
            }
            refreshCaptcha();
        }
    </script>
    <meta charset="UTF-8">
    <link href="captcha.css" type="text/css"/>
    <link rel="stylesheet" href="https://www.phptutorial.net/app/css/style.css">>
    <title>Register</title>
</head>
<body onload="generateCaptcha()">
<main>
    <form action="register.php" method="post" >
        <h1>Register</h1>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password:</label>
            <input type="password" name="password" id="password">
        </div>
        
       
        <div class="captcha">
        <span id="captcha-text"></span>
        <span class="captcha-refresh" onclick="refreshCaptcha()">Refresh</span>
    </div>
    <br>
    <input type="text" id="user-captcha" placeholder="Introdu codul CAPTCHA">
        
        
        Ai deja cont? Apasa <a href="loginPage.php">aici</a>
       <input type="submit" class="btn btn-success mt-3" name="register" value="Register!" onclick="validateCaptcha()">
    </form>
</main>
</body>
</html>