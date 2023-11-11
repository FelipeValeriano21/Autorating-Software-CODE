<?php
include('../../../../CONEXAOPHP/conexao.php');
session_start();

$cpf = $_SESSION['cpf'];

$procedure = "SELECT idTB_Gestor FROM TB_Gestor WHERE Gestor_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $idTB_Gestor = $dados['idTB_Gestor'];
}

$datainicio = $_POST['datainicio'];
$datafim = $_POST['datafim'];
$qtd = $_POST['qtd'];
$descricao = $_POST['descricao'];

$sql = "INSERT INTO `tb_questionario`(`TB_Gestor_idTB_Gestor`, `Questionario_Descricao`, `Questionario_Inicio`, `Questionario_Fim`, `Questionario_Qta_Perguntas`, `Questionario_Status`) VALUES ('$idTB_Gestor','$descricao','$datainicio','$datafim','$qtd','1')";

if (mysqli_query($conn, $sql)) {
    $questionario_id = mysqli_insert_id($conn);

    if (isset($_POST['colaborador_id'])) {
        $colaborador_ids = $_POST['colaborador_id'];

        foreach ($colaborador_ids as $colaborador_id) {
            $sql_associativa = "INSERT INTO `tb_colaborador_associa_tb_questionario`(`TB_Colaborador_idTB_Colaborador`, `TB_Questionario_idTB_Questionario`, `status`) VALUES ('$colaborador_id','$questionario_id','1')";

            if (mysqli_query($conn, $sql_associativa)) {
                header("location: ../Pesquisas.php");
                $_SESSION['avaliacaocriada'] = "";
            } else {
                header("location: ../Pesquisas.php");
                $_SESSION['errocriaravaliacao'] = "";
            }
        }
    }

    if (isset($_POST['categoria']) && is_array($_POST['categoria'])) {
        foreach ($_POST['categoria'] as $categoria_id) {
            $categoria_id = $conn->real_escape_string($categoria_id);
            $sql_associativa2 = "INSERT INTO `tb_questionario_has_tb_categoria`(`TB_Questionario_idTB_Questionario`, `TB_Categoria_idTB_Categoria`) VALUES ('$questionario_id','$categoria_id')";
            mysqli_query($conn, $sql_associativa2);
        }
    }
} else {
    header("location: ../Pesquisas.php");
    $_SESSION['errocriaravaliacao'] = "";
}

mysqli_close($conn);
?>
