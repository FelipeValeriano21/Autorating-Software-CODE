<?php
include('../../../LOGOFF/adm_credencial.php');
include '../../../CONEXAOPHP/conexao.php';

session_start();

if (isset($_GET['idTB_Gestor'])) {
    $idTB_Gestor = $_GET['idTB_Gestor'];

    $query = "SELECT Gestor_Status FROM TB_Gestor WHERE idTB_Gestor = '$idTB_Gestor'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $statusAtual = $row['Gestor_Status'];

        $novoStatus = ($statusAtual == 0) ? 1 : 0;

        $updateQuery = "UPDATE TB_Gestor SET Gestor_Status = '$novoStatus' WHERE idTB_Gestor = '$idTB_Gestor'";
        if (mysqli_query($conn, $updateQuery)) {
            header('location: gerirgestores.php');
            $_SESSION['desligagestor'] = "";
            
            exit; // Saia do script após o redirecionamento
        } else {
            header('location: gerirgestores.php');
            $_SESSION['erroinsertgestor'] = "";
        }
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
