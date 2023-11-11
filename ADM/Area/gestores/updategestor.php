<?php
include('../../../LOGOFF/adm_credencial.php');
include '../../../CONEXAOPHP/conexao.php';

session_start();

if (isset($_POST['idTB_Gestor'])) {
    $idTB_Gestor = $_POST['idTB_Gestor'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];

    $updateQuery = "UPDATE tb_gestor SET 
        Gestor_Nome = '$nome',
        Gestor_Email = '$email',
        Gestor_Telefone = '$telefone',
        Gestor_Nascimento = '$nascimento'
        WHERE idTB_Gestor = '$idTB_Gestor'";

    if (mysqli_query($conn, $updateQuery)) {
        header('location: gerirgestores.php');
        $_SESSION['sucessoupdategestor'] = "";
        
        exit; // Saia do script após o redirecionamento
    } else {
        header('location: gerirgestores.php');
        $_SESSION['erroinsertgestor'] = "";
    }
} else {
    header('location: gerirgestores.php');
    $_SESSION['erroinsertgestor'] = "";
}

mysqli_close($conn);
?>
