<?php
include('../../../LOGOFF/adm_credencial.php');
include '../../../CONEXAOPHP/conexao.php';

session_start();

if (isset($_GET['idEmpresa_Contratante'])) {
    $idEmpresa_Contratante = $_GET['idEmpresa_Contratante'];

    $query = "SELECT Empresa_status FROM  empresa_contratante WHERE idEmpresa_Contratante = '$idEmpresa_Contratante'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $statusAtual = $row['Empresa_status'];

        $novoStatus = ($statusAtual == 0) ? 1 : 0;

        $updateQuery = "UPDATE empresa_contratante SET Empresa_status = '$novoStatus' WHERE idEmpresa_Contratante = '$idEmpresa_Contratante'";
        if (mysqli_query($conn, $updateQuery)) {
            header('location: gerirempresa.php');
            $_SESSION['desligaempresa'] = "";
            exit; // Saia do script após o redirecionamento
        } else {
            header('location: gerirempresa.php');
            $_SESSION['erroempresa'] = "";
        }
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
