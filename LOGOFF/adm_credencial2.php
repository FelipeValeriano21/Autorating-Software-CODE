<?php

session_start();

if (!isset($_SESSION['adm_email'])) {
    $loginPath = "../../index.php";
    header("Location: $loginPath");
    exit();
}


?>