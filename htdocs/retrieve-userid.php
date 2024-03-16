<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Username</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anonymous+Pro:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="retrieve-style.css">
</head>
<body>
    <div class="login-container">
        <h1>Find Registered Username</h1>
        <form action="findUserID.php" id="findUserIDForm" method="post">
            <div class="form-group">

            <label for="option">Retrieve user credentials by:</label>

            <select name="option" id="option">
                <option value="null" selected>---</option>
                <option value="email">Email</option>
            </select>

            <p></p>
                <!-- <label for="email">Enter your email/username:</label> -->
            <input type="text" id="email" name="email" placeholder="Enter Email"required>
            <input type="password" id="password" name="password" placeholder="Enter Password"required>
            </div>
            <button type="submit" name="submit">Find</button>
            <div class="links">
                <a href="register.html">Create an account</a>
            </div>
        </form>
    </div>

    <?php
        if (isset($_GET['error'])) {
            echo '<p class="error">' . $_GET['error'] . '</p>';
        }
    ?>
</body>
</html>
