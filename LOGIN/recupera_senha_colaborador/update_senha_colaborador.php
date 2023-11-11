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
$sql = "UPDATE tb_colaborador SET colaborador_senha = '$novaSenha' WHERE colaborador_CPF = '$cpf'";

if ($conn->query($sql) === TRUE) {
    header("location: ../teladelogin.php");
    $_SESSION['senha_alterada'] = "";
} else {
    header("location: confirma_senha_colaborador.php");
    $_SESSION['confirmarsenhaerrocolab'] = "";
}

// Feche a conexão com o banco de dados
$conn->close();
?>
