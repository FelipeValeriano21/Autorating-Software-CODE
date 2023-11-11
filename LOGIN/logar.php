<?php
session_start();
require_once('../CONEXAOPHP/conexao.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["cpf"])) {
    $cpf = $_POST["cpf"];
    $password = $_POST["password"];
    $credencial = $_POST["credencial"];
    $unidade = $_POST["unidade"];
    $quantidadeCaracteres = strlen($cpf);

    if ($cpf != "" && $password != "") {
        if ($credencial == "Gestor") {
            $sql = "SELECT TG.*
            FROM TB_Gestor TG
            INNER JOIN empresa_contratante EC ON TG.Empresa_Contratante_idEmpresa_Contratante = EC.idEmpresa_Contratante
            WHERE TG.Gestor_CPF = '$cpf' 
              AND TG.GESTOR_Senha = '$password' 
              AND EC.Empresa_Status = '1' 
              AND TG.Gestor_Status = '1'
              AND TG.Empresa_Contratante_idEmpresa_Contratante = '$unidade';
            ";
            $result = $conn->query($sql);
            
            if ($result->num_rows == 1) {
                $_SESSION['cpf'] = $cpf;
                header('location: ../GESTOR/MENU/menu.php');
            } else {
                header("location: teladelogin.php");
                $_SESSION['status'] = "";
            }
        } else if ($credencial == "Colaborador") {
            $sql = "SELECT c.*, g.* FROM TB_Colaborador c INNER JOIN TB_Gestor g WHERE Colaborador_CPF = '$cpf' AND Colaborador_Senha = '$password' AND c.TB_Gestor_idTB_Gestor = g.idTB_Gestor AND g.Empresa_Contratante_idEmpresa_Contratante = '$unidade' AND Colaborador_Status = '1'";
            $result = $conn->query($sql);
            
            if ($result->num_rows == 1) {
                $_SESSION['cpf'] = $cpf;
                header('location: ../COLABORADOR/MENU/menu.php');
            } else {
                header("location: teladelogin.php");
                $_SESSION['status'] = "";
            }
        }
    } else {
        header("location: teladelogin.php");
        $_SESSION['campos_vazios'] = "";
    }
}
?>
