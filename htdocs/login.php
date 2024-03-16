<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$is_invalid = false;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = sprintf("SELECT * FROM user WHERE (email = '%s' OR username = '%s') AND saved_password = '%s'", $_POST["userid"], $_POST["userid"], $_POST["password"]);
    
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
    
    if ($user) {
        
        session_start();
            
        session_regenerate_id();
            
        $_SESSION["user_id"] = $user["id"];
        
        header("Location: index.php");
        exit;
    }
    
    $is_invalid = true;
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta http-equiv='cache-control' content='no-cache'> 
    <meta http-equiv='expires' content='0'> 
    <meta http-equiv='pragma' content='no-cache'>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login/Register</title>
    <link rel="stylesheet" href="login-style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
</head>
<body>

    <div class="wrapper">
        <form method="post">
            <h1>Login</h1>

            <div class="input-box">
                <label for="userid"></label>
                <input placeholder="Username" name="userid" id="userid">
            </div>

            <?php if ($is_invalid): ?>
            <em>Invalid login</em>
            <?php endif; ?>

            <div class="input-box">
                <label for="password"></label>
                <input type="password" placeholder="Password" name="password" id="password">
            </div>

            <div class="remember-forgot">
                <label>
                    <input type="checkbox"> Remember me
                </label>
                <button type="button" id="togglePassword">Show Password</button>
            </div>
            

            
            <button class="btn" >Log in</button>
            <div class="register-link">
                <p>Don't have an account? <a href="register.html">Register</a></p>
                <p>Forgot username? <a href="retrieve-userid.php">Retrieve here</a></p>
            </div>
        </form>
    </div>

    <script>
        const toggleBtn = document.querySelector('.toggle_btn')
        const toggleBtnIcon = document.querySelector('.toggle_btn i')
        const dropDownMenu = document.querySelector('.dropdown_menu')

        toggleBtn.onclick = function() {
            dropDownMenu.classList.toggle('open');
            const isOpen = dropDownMenu.classList.contains('open');

            toggleBtnIcon.classList = isOpen
                ? 'fa-solid fa-xmark'
                : 'fa-solid fa-bars'
        }

        document.addEventListener('scroll', () => {
            const header = document.querySelector('header');

            if (window.scrollY > 220) {
                header.classList.add('scrolled');
            }
            else {
                header.classList.remove('scrolled');
            }
        })
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const togglePasswordButton = document.getElementById("togglePassword");
            const passwordField = document.getElementById("password");

            togglePasswordButton.addEventListener("click", function() {
                if (passwordField.type === "password") {
                    passwordField.type = "text";
                    togglePasswordButton.textContent = "Hide Password";
                } else {
                    passwordField.type = "password";
                    togglePasswordButton.textContent = "Show Password";
                }
            });
        });
    </script>
</body>
</html>
