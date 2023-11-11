<?php
$servername = "localhost";
$database = "autorating";
$username = "root";
$password = "Cas@5874";

$conn = mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

?>