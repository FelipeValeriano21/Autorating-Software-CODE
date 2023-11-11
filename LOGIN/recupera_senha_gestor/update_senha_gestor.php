<?php
session_start();

include('../../CONEXAOPHP/conexao.php');

// Verifique a conexão
if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$novaSenha = $_POST['novasenha'];
$cpf = $_SESSION['confirmacpf'];

// Consulta SQL para atualizar a senha
$sql = "UPDATE tb_Gestor SET Gestor_senha = '$novaSenha' WHERE  Gestor_CPF = '$cpf'";

if ($conn->query($sql) === TRUE) {
    header("location: ../teladelogin.php");
    $_SESSION['senha_alterada'] = "";
} else {
    header("location: confirma_senha_gestor.php");
    $_SESSION['confirmarsenhaerrogest'] = "";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
