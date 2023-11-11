<?php

include('../CONEXAOPHP/conexao.php');

if ($conn->connect_error) {
    die("Falha na conexão com o banco de dados: " . $conn->connect_error);
}

$nomedono = $_POST['nomedono'];
$nomeempresa = $_POST['nomeempresa'];
$emailempresa = $_POST['emailempresa'];
$telefoneempresa = $_POST['telefoneempresa'];
$status = '0';

$nomedono = mysqli_real_escape_string($conn, $nomedono);
$nomeempresa = mysqli_real_escape_string($conn, $nomeempresa);
$emailempresa = mysqli_real_escape_string($conn, $emailempresa);
$telefoneempresa = mysqli_real_escape_string($conn, $telefoneempresa);
$status = mysqli_real_escape_string($conn, $status);

$sql = "INSERT INTO empresa_contratante (`Empresa_Nome`, `Empresa_Email`, `Empresa_Telefone`, `Empresa_Dono`, `Empresa_status`)
        VALUES ('$nomeempresa', '$emailempresa', '$telefoneempresa', '$nomedono', '$status')";

if ($conn->query($sql) === TRUE) {
    session_start();

    header("location: ../index.php");
    $_SESSION['mensagemenviadacomsucesso'] = "";
} else {
    header("location: ../index.php");
    $_SESSION['mensagemerro'] = "";
}

$conn->close();

?>
