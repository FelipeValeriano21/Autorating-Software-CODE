<?php 
session_start();
require_once('../CONEXAOPHP/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["adm_email"])) {

    $adm_email = $_POST["adm_email"];
    $adm_senha = $_POST["adm_senha"];

    $sql = "SELECT * FROM tb_Adm WHERE adm_email = '$adm_email' AND adm_senha = '$adm_senha'";
    $result = $conn->query($sql);
    
    if ($result->num_rows == 1) {
        $_SESSION['adm_email'] = $adm_email;
        header("location: Area/area.php");
        
    } else {
        header("location: index.php");
        $_SESSION['erroradm'] = "";
    }

}else{

    header("location: index.php");
    $_SESSION['erroradm'] = "";

}



?>