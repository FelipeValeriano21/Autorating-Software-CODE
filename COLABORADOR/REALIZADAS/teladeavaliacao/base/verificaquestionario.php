<?php

include('../../../../CONEXAOPHP/conexao.php');
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $vetorGabarito = $data['vetorGabarito'];
    $Questao_Correta = $data['Questao_Correta'];
    $numerodoquestionario = $data['NumeroQuestionario'];
    $colaborador = $data['Colaborador'];

    $corretas = 0;
    $erradas = 0;

    if (count($vetorGabarito) == count($Questao_Correta)) {
        $totalQuestoes = count($vetorGabarito);

        for ($i = 0; $i < $totalQuestoes; $i++) {
            if ($vetorGabarito[$i] == $Questao_Correta[$i]) {
                $corretas++;
            } else {
                $erradas++;
            }
        }

         $notafinal =  $corretas*100/($erradas+$corretas);

        echo "Respostas corretas: " . $corretas . "<br>";
        echo "Respostas erradas: " . $erradas. "<br>";
        echo "Número do questionário ".  $numerodoquestionario. "<br>" ;
        echo "ID do colaborador ".   $colaborador. "<br>" ;


        if ($conn->connect_error) {
            die("Conexão com o banco de dados falhou: " . $conn->connect_error);
        }

        $sql = "UPDATE tb_colaborador_associa_tb_questionario SET Respostas_Certas = $corretas, Respostas_Erradas = $erradas, Resultado_Final =  $notafinal , status = '0' WHERE TB_Questionario_idTB_Questionario = $numerodoquestionario AND TB_Colaborador_idTB_Colaborador  = $colaborador";

        if ($conn->query($sql) === TRUE) {
            header("location: ../../realizadas.php");
            $_SESSION['avaliacaorealizada'] = "";
        } else {
            header("location: ../../realizadas.php");
            $_SESSION['erroavaliacao'] = "";
        }

        $conn->close();
    } else {
        header("location: ../../realizadas.php");
        $_SESSION['erroavaliacao'] = "";
    }
} else {
    http_response_code(405);
    header("location: ../../realizadas.php");
    $_SESSION['erroavaliacao'] = "";
}
?>


