<?php

include('../../../CONEXAOPHP/conexao.php');
session_start();

$cpf = $_SESSION['cpf'];

$procedure = "select idTB_Gestor from TB_Gestor where Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $idTB_Gestor = $dados['idTB_Gestor'];
}
?>


<?php


if (isset($_POST['idTB_Questoes'])) {
   $idTB_Questoes = $_POST['idTB_Questoes'];
    $tipoquestao = $_POST['tipoquestao'];
    $categoria = $_POST['categoria'];
    $comando = $_POST['comando'];
    $respA = $_POST['respA'];
    $respB = $_POST['respB'];
    $respC = $_POST['respC'];
    $respD = $_POST['respD'];
    $respcorreta = $_POST['respcorreta'];
    $status = '1';
    $dataAtual = date("Y-m-d");


 if ($tipoquestao != "" && $categoria != "" && $comando != "" && $respA != "" && $respB != "" && $respC != "" && $respD != "" && $respcorreta != "") {

    // Atualize as informações no banco de dados, incluindo a imagem
    $sql = "UPDATE `tb_questoes` SET `TB_Tipo_Questao_idTB_Tipo_Questao`='$tipoquestao',`TB_Categoria_idTB_Categoria`='$categoria ',`Questoes_Pergunta`='$comando',`Questoes_A`='$respA',`Questoes_B`='$respB',`Questoes_C`='$respC',`Questoes_D`='$respD',`Questao_Correta`='$respcorreta',`Questao_Data`='$dataAtual',`Questao_Status`='$status',`TB_Gestor_idTB_Gestor`='$idTB_Gestor' WHERE idTB_Questoes  = '$idTB_Questoes'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['status_editar'] = "";
        header("location: ../Perguntas.php");
        $_SESSION['status_editar_perguntas'] = "";
    } else {
        header("location: ../Perguntas.php");
        $_SESSION['errorgenericoquest'] = "";

    }

 }else{
    header("location: ../Perguntas.php");
    $_SESSION['status_editar_perguntas_camposembranco'] = "";

 }

}else{
    header("location: ../Perguntas.php");
    $_SESSION['errorgenericoquest'] = "";
    
}

$conn->close();

?>