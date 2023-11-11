<?php
session_start();

include('../CONEXAOPHP/conexao.php');

if ($conn->connect_error) {
    die("Conexão com o banco de dados falhou: " . $conn->connect_error);
}

$confirmacpf = $_POST['confirmacpf'];
$confirmaemail = $_POST['confirmaemail'];
$confirmadata = $_POST['confirmadata'];
$credencial = $_POST['credencial'];

if ($credencial == "Gestor") {
    $sql = "SELECT * FROM tb_Gestor WHERE Gestor_CPF = '$confirmacpf' AND Gestor_email = '$confirmaemail' AND Gestor_Nascimento = '$confirmadata'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['confirmacpf'] = $confirmacpf;
        header("location: recupera_senha_gestor/confirma_senha_gestor.php");
    }else{

        header("location: telaesquecisenha.php");
        $_SESSION['camposincorretos'] = ""; 

    }
    
}else if ($credencial == "Colaborador") {
    $sql = "SELECT * FROM tb_Colaborador WHERE colaborador_CPF = '$confirmacpf' AND colaborador_email = '$confirmaemail' AND colaborador_Nascimento = '$confirmadata'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['confirmacpf'] = $confirmacpf;
        header("location: recupera_senha_colaborador/confirma_senha_colaborador.php");
    }else{

        header("location: telaesquecisenha.php");
        $_SESSION['camposincorretos'] = ""; 

    } 
}else{

    header("location: telaesquecisenha.php");
    $_SESSION['camposincorretos'] = ""; 

}



$conn->close();
?>
