<?php

session_start();

include('../../CONEXAOPHP/conexao.php');

$cpf = $_SESSION['cpf'];

$procedure = "SELECT idTB_Gestor FROM TB_Gestor WHERE Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn)); //caso haja um erro na consulta

while ($dados = mysqli_fetch_assoc($sql)){
  $idTB_Gestor = $dados['idTB_Gestor'];
}

$email = mysqli_real_escape_string($conn, $_POST['email']); // Use mysqli_real_escape_string para evitar injeções de SQL
$senha = mysqli_real_escape_string($conn, $_POST['senha']); // Use mysqli_real_escape_string para evitar injeções de SQL
$telefone = mysqli_real_escape_string($conn, $_POST['telefone']); // Use mysqli_real_escape_string para evitar injeções de SQL
$confirmasenha = mysqli_real_escape_string($conn, $_POST['confirmasenha']);




if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

if ($email != "" && $senha != "" && $telefone != "") {

  if($senha == $confirmasenha){

    $sql = "UPDATE TB_Gestor SET Gestor_Senha='$senha', Gestor_Email='$email', Gestor_Telefone = '$telefone' WHERE idTB_Gestor='$idTB_Gestor'";

    if ($conn->query($sql) === TRUE) {
    header("location: profile.php");
    $_SESSION['sucesso_update_profile_gestor'] = "";
    } else {
      header("location: profile.php");
      $_SESSION['error_update_profile_gestor'] = "";
    }

  }else{


    header("location: profile.php");
    $_SESSION['error_update_profile_gestor'] = "";

  }

  

  }else{
  
    header("location: profile.php");
    $_SESSION['error_update_profile_gestor_vazio'] = "";

}











$conn->close();
?>
