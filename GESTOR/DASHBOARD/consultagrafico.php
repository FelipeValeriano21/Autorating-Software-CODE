<?php
include '../../CONEXAOPHP/conexao.php';

if (isset($_GET['colaboradorId'])) {
    $colaboradorId = $_GET['colaboradorId'];

    $query = "SELECT TB_Questionario_idTB_Questionario, Resultado_Final FROM  tb_colaborador_associa_tb_questionario  WHERE TB_Colaborador_idTB_Colaborador = $colaboradorId and status = '0'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = array();
        $labels = array();
        $dados = array();

        while ($row = mysqli_fetch_assoc($result)) {
            $labels[] = $row['TB_Questionario_idTB_Questionario']; 
            $dados[] = $row['Resultado_Final'];
        }

        $data['labels'] = $labels;
        $data['dados'] = $dados;

        echo json_encode($data);
    } else {
        echo json_encode(array('error' => 'Erro na consulta ao banco de dados'));
    }
} else {
    echo json_encode(array('error' => 'ID do colaborador não fornecido'));
}
?>

