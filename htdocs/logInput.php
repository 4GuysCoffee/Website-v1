<?php
$input = $_POST['email'];

// Open a file for appending
$file = fopen("input.log", "a");

// Write the input to the file
fwrite($file, "User input: " . $input . "\n");

// Close the file
fclose($file);

exit();