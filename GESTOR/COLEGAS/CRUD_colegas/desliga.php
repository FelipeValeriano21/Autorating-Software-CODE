<?php

include '../../../ConexaoPHP/conexao.php';

if (isset($_GET['idTB_Colaborador'])) {
    $idTB_Colaborador = $_GET['idTB_Colaborador'];

    $query = "SELECT Colaborador_status FROM TB_Colaborador WHERE idTB_Colaborador='$idTB_Colaborador'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $statusAtual = $row['Colaborador_status'];

        $novoStatus = ($statusAtual == 0) ? 1 : 0;

        $updateQuery = "UPDATE TB_Colaborador SET Colaborador_status = '$novoStatus' WHERE idTB_Colaborador='$idTB_Colaborador'";
        if (mysqli_query($conn, $updateQuery)) {
            session_start();
            header('location: ../colegas.php');
            $_SESSION['Desligadocomsucesso'] = "";
        } else {
            header('location: ../colegas.php');
            $_SESSION['Errogenerico'] = "";
           
        }
    } else {
        header('location: ../colegas.php');
        $_SESSION['Errogenerico'] = "";
    }
} else {
    header('location: ../colegas.php');
    $_SESSION['Errogenerico'] = "";
}

mysqli_close($conn);
?>
