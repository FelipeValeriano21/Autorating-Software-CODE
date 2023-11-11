<?php

include('../../CONEXAOPHP/conexao.php');
include('../../LOGOFF/verifica_credencial.php');

$cpf = $_SESSION['cpf'];

$procedure = "SELECT * FROM tb_colaborador WHERE Colaborador_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $idTB_Colaborador = $dados['idTB_Colaborador'];     

}



if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$sql = "SELECT Resultado_Final, TB_Questionario_idTB_Questionario FROM tb_colaborador_associa_tb_questionario  where TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador' and status = '0' ";
$result = $conn->query($sql);

$data = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = array(
            
            "Resultado_Final" => $row["Resultado_Final"],
            "TB_Questionario_idTB_Questionario" => $row["TB_Questionario_idTB_Questionario"]
            
        );
    }
}

$conn->close();

$data_json = json_encode($data);

echo ($data_json);
?>
