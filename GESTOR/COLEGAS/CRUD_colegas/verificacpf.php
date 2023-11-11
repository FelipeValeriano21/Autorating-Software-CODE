<?php
include('../../../CONEXAOPHP/conexao.php');

if ($conn->connect_error) {
    die("Erro na conexão com o banco de dados: " . $conn->connect_error);
}


$cpf = $_POST['cpf'];

$sql = "SELECT COUNT(*) AS total FROM TB_colaborador WHERE Colaborador_CPF = '$cpf'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "CPF já cadastrado.";
} else {
    echo "CPF ainda não cadastrado.";
}

$conn->close();
?>