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



$sql = "INSERT INTO `tb_questoes`( `TB_Tipo_Questao_idTB_Tipo_Questao`, `TB_Categoria_idTB_Categoria`, `Questoes_Pergunta`, `Questoes_A`, `Questoes_B`, `Questoes_C`, `Questoes_D`, `Questao_Correta`, `Questao_Data`, `Questao_Status`, `TB_Gestor_idTB_Gestor`) VALUES ('$tipoquestao','$categoria','$comando','$respA','$respB','$respC','$respD','$respcorreta','$dataAtual',1,'$idTB_Gestor')";
if (mysqli_query($conn, $sql)) {

      header('location: ../Perguntas.php');
      $_SESSION['status_Perguntacadastradasucesso'] = "";
 

} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      header('location: insert.php');
      $_SESSION['insertquesterro'] = "";

}



mysqli_close($conn);

?>