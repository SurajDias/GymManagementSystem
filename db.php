<?php
$servername = "localhost";
$username = "suraj";
$password = "password";
$dbname = "gym_management";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
