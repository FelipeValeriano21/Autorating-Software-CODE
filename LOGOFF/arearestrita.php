<?php

session_start();

if (!isset($_SESSION['cpf'])) {
    $loginPath = "../../../Login/teladelogin.php";
    header("Location: $loginPath");
    exit();
}


?>