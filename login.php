<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"] ?? ""; // Get the value of the "name" input field, if it exists
    $password = $_POST["password"] ?? ""; // Get the value of the "password" input field, if it exists

    echo "Welcome: $name, your password is: $password";
}
?>
 