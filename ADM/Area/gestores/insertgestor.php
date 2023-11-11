<?php
include('../../../LOGOFF/adm_credencial.php');
include('../../../CONEXAOPHP/conexao.php');
session_start();

$cpf = $_POST['cpf'];
$departamento = $_POST['departamento'];
$empresa = $_POST['empresa'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$admissao = $_POST['adimissao'];
$nascimento = $_POST['nascimento'];
$senha = $_POST['senha'];
$status = 1;
$foto = "";

// Verificar se o CPF já está cadastrado
$verificar_cpf = "SELECT COUNT(*) AS count FROM tb_gestor WHERE Gestor_CPF = '$cpf'";
$result = mysqli_query($conn, $verificar_cpf);
$row = mysqli_fetch_assoc($result);
if ($row['count'] > 0) {
    header('location: gerirgestores.php');
    $_SESSION['cpf_duplicado'] = "";
    exit;
}

// Se o CPF não está duplicado, insira o novo registro
$sql = "INSERT INTO tb_gestor (TB_Departamento_idTB_Departamento, Empresa_Contratante_idEmpresa_Contratante, Gestor_Nome, Gestor_CPF, Gestor_Email, Gestor_Nascimento, Gestor_Telefone, Gestor_Adimissao, Gestor_Senha, Gestor_Status, Gestor_Foto) VALUES ('$departamento', '$empresa', '$nome', '$cpf', '$email', '$nascimento', '$telefone', '$admissao', '$senha', '$status', '$foto')";

if (mysqli_query($conn, $sql)) {
    header('location: gerirgestores.php');
    $_SESSION['sucessoinsertgestor'] = "";
} else {
    header('location: gerirgestores.php');
    $_SESSION['erroinsertgestor'] = "";
}

mysqli_close($conn);
?>
