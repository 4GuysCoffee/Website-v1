<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "root";
$password = "";
$database = "test";

$conn = new mysqli($servername, $username, $password, $database);

$userInput = $_POST['email'];

date_default_timezone_set('Asia/Singapore');
$timestamp = date('Y-m-d H:i:s');
$logMessage = $timestamp . ": " . "User input: " . $userInput . "\n";

$logFilePath = 'user_input.log';
$file = fopen($logFilePath, 'a');
if ($file) {
    fwrite($file, $logMessage . "\n");
    fclose($file);
} else {
    echo "Unable to open file to save log message.";
}


$input = $_POST['email'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if 'option' is set and its value is 'email'
    if (isset($_POST['option']) && $_POST['option'] === 'email') {
        // Check if email and password are provided
        if (isset($_POST['email']) && isset($_POST['password'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Perform your database query
            $sql = "SELECT * FROM user WHERE email = '$email' AND saved_password = '$password'";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "Your username is: " . $row["username"];
                }
            } else {
                echo "Invalid Email/Password.";
            }
        } else {
            echo "Email and password are required.";
        }
    } else {
        $email = $_POST['email'];
        $sql = "SELECT * FROM user WHERE email = '$email' AND saved_password = '$password'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                // Output the entire row
                foreach ($row as $key => $value) {
                    echo "$key: $value<br>";
                }
            }
        }
    }
}






// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//     $email = $_POST['email'];

//     $sql = sprintf("SELECT username FROM user WHERE email = '%s' AND saved_password = '%s'", $_POST["email"], $_POST["password"]);
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         while($row = $result->fetch_assoc()) {
//             echo "Your username is: " . $row["username"];
//         }
//     } else {
//         echo "Invalid Email/Password.";
//     }
// }