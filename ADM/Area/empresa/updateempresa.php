<?php
include('../../../LOGOFF/adm_credencial.php');
include '../../../CONEXAOPHP/conexao.php';

session_start();

if (isset($_POST['idEmpresa_Contratante'])) {
    $idEmpresa_Contratante = $_POST['idEmpresa_Contratante'];
    $Empresa_Nome = $_POST['Empresa_Nome'];
    $Empresa_Email = $_POST['Empresa_Email'];
    $Empresa_Telefone = $_POST['Empresa_Telefone'];
    $Empresa_Dono = $_POST['Empresa_Dono'];

    $updateQuery = "UPDATE empresa_contratante SET 
        Empresa_Nome = '$Empresa_Nome',
        Empresa_Email = '$Empresa_Email',
        Empresa_Telefone = '$Empresa_Telefone',
        Empresa_Dono = '$Empresa_Dono' 
        WHERE idEmpresa_Contratante = '$idEmpresa_Contratante'";

    if (mysqli_query($conn, $updateQuery)) {
        header('location: gerirempresa.php');
        $_SESSION['updateempresa'] = "";
        exit; // Saia do script após o redirecionamento
    } else {
        header('location: gerirempresa.php');
        $_SESSION['erroempresa'] = "";
    }
} else {
    header('location: gerirempresa.php');
    $_SESSION['erroempresa'] = "";
}

mysqli_close($conn);
?>
