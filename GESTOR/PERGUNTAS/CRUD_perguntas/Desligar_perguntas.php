
<?php

include '../../../CONEXAOPHP/conexao.php';

if (isset($_GET['idTB_Questoes'])) {
    $idTB_Questoes = $_GET['idTB_Questoes'];

   
    $query = "SELECT Questao_Status FROM tb_questoes WHERE idTB_Questoes='$idTB_Questoes'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $statusAtual = $row['Questao_Status'];

        $novoStatus = ($statusAtual == 0) ? 1 : 0;


        $updateQuery = "UPDATE tb_questoes SET Questao_Status = '$novoStatus' WHERE idTB_Questoes='$idTB_Questoes'";
        if (mysqli_query($conn, $updateQuery)) {
            session_start();
            header('location: ../Perguntas.php');
            $_SESSION['Desligadocomsucesso'] = "";
        } else {
            header("location: ../Perguntas.php");
            $_SESSION['errorgenericoquest'] = "";
        }
    } else {
        header("location: ../Perguntas.php");
        $_SESSION['errorgenericoquest'] = "";
    }
} else {
    header("location: ../Perguntas.php");
    $_SESSION['errorgenericoquest'] = "";
}

$conn->close();
?>
