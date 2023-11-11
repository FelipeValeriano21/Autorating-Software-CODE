<?php
require_once 'relatorios/dompdf/vendor/autoload.php'; // Caminho para o Dompdf
include('../../CONEXAOPHP/conexao.php');

use Dompdf\Dompdf;
use Dompdf\Options;


// Verifique se os dados foram enviados pelo formulário
if (isset($_GET['data_inicio']) && isset($_GET['data_fim']) && isset($_GET['colaboradorrelatorio'])) {
    $dataInicio = $_GET['data_inicio'];
    $dataFim = $_GET['data_fim'];
    $colaboradorSelecionado = $_GET['colaboradorrelatorio'];

   
$options = new Options();
$options->set('isPhpEnabled', true); // Permitir a execução de código PHP
$dompdf = new Dompdf($options);

//////////////////////////////////////////////////

$consulta = "SELECT Colaborador_Nome, TB_Gestor_idTB_Gestor  FROM tb_colaborador WHERE idTB_Colaborador = '$colaboradorSelecionado'";
$resultado = mysqli_query($conn, $consulta);

if ($resultado) {
    $dadosColaborador = mysqli_fetch_assoc($resultado);
    $nomecolaborador = $dadosColaborador['Colaborador_Nome'];
    $id_Gestor = $dadosColaborador['TB_Gestor_idTB_Gestor'];

} else {
    echo "Erro na consulta ao banco de dados.";
}

///////////////////////////////////////////////////

$consulta = "SELECT Gestor_Nome, Empresa_Contratante_idEmpresa_Contratante FROM tb_gestor WHERE idTB_Gestor = '$id_Gestor'";
$resultado = mysqli_query($conn, $consulta);

if ($resultado) {
    $dadosGestor = mysqli_fetch_assoc($resultado);
    $nomeGestor = $dadosGestor['Gestor_Nome'];
    $Empresa_Contratante_idEmpresa_Contratante  = $dadosGestor['Empresa_Contratante_idEmpresa_Contratante'];

} else {
    echo "Erro na consulta ao banco de dados.";
}

////////////////////////////////////////////////////////

$consulta = "SELECT Empresa_Nome FROM empresa_contratante WHERE idEmpresa_Contratante  = '$Empresa_Contratante_idEmpresa_Contratante'";
$resultado = mysqli_query($conn, $consulta);

if ($resultado) {
    $dadosempresa = mysqli_fetch_assoc($resultado);
    $nomeEmpresa = $dadosempresa['Empresa_Nome'];

} else {
    echo "Erro na consulta ao banco de dados.";
}


// Seu HTML com PHP incorporado
$html = '<html>
<head>
    <title>Relatório em PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .header {
            text-align: center;
        }
        .logo {
            max-width: 100px;
        }
        .title {
            font-size: 24px;
            margin: 20px 0;
        }
        .date {
            text-align: right;
        }
        .info {
            font-size: 14px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
   <h5>AUTORATING SOFTWARE</h5>
    <div class="header">
        <h1 class="title">Relatório de Desempenho</h1>
        <p class="date">Data de Emissão: ' . date('Y-m-d') . '</p>
    </div>

    <p><b>Nome do Colaborador(a): </b>' . $nomecolaborador . '</p>
    <hr>
    
    <div class="info">
        <p><b>Nome do Gestor(a): </b>' . $nomeGestor . '</p>
        <p><b>Empresa Contratante: </b>' . $nomeEmpresa . '</p>
        <p><b>Período: </b>' . $dataInicio . '- ' . $dataFim . '</p>
    </div>

    <br>
    
    <p>Este é um relatório detalhado sobre o desempenho dos colaboradores. Inclui informações sobre os principais indicadores e métricas de desempenho.</p>
    
    <br>
    <h2>Tabela de Dados:</h2>
    
    <table>
        <tr>
            <th>ID da pesquisa</th>
            <th>Nota Final</th>
            <th>N° de questões</th>
            <th>Categoria(s) utilizadas</th>
        </tr>';

// Consulta SQL para selecionar os dados entre as datas desejadas
$consulta = "SELECT *
            FROM tb_questionario AS q
            INNER JOIN tb_colaborador_associa_tb_questionario AS ca ON q.idTB_Questionario = ca.TB_Questionario_idTB_Questionario
            INNER JOIN tb_questionario_has_tb_categoria AS qc ON q.idTB_Questionario = qc.TB_Questionario_idTB_Questionario
            INNER JOIN tb_categoria AS c ON qc.TB_Categoria_idTB_Categoria = c.idTB_Categoria
            WHERE ca.TB_Colaborador_idTB_Colaborador = '$colaboradorSelecionado'
            AND ca.status = '0'
            AND q.Questionario_Inicio >= '$dataInicio' AND q.Questionario_Inicio <= '$dataFim'";
$resultado = mysqli_query($conn, $consulta);

// Verifica se a consulta teve sucesso
if ($resultado) {
    while ($row = mysqli_fetch_assoc($resultado)) {
        $html .= '<tr>';
        $html .= '<td>' . $row['TB_Questionario_idTB_Questionario'] . '</td>';
        $html .= '<td>' . $row['Resultado_Final'] . '</td>';
        $html .= '<td>' . $row['Questionario_Qta_Perguntas'] . '</td>';
        $html .= '<td>' . $row['Categoria_Nome'] . '</td>';
        $html .= '</tr>';
    }
} else {
    $html .= '<tr><td colspan="4">Erro na consulta ao banco de dados.</td></tr>';
}

$html .= '</table>

    <br>
    <br>

';

$consulta = "SELECT Categoria_Nome, AVG(Resultado_Final) AS MediaNota
            FROM tb_questionario AS q
            INNER JOIN tb_colaborador_associa_tb_questionario AS ca ON q.idTB_Questionario = ca.TB_Questionario_idTB_Questionario
            INNER JOIN tb_questionario_has_tb_categoria AS qc ON q.idTB_Questionario = qc.TB_Questionario_idTB_Questionario
            INNER JOIN tb_categoria AS c ON qc.TB_Categoria_idTB_Categoria = c.idTB_Categoria
            WHERE ca.TB_Colaborador_idTB_Colaborador = '$colaboradorSelecionado'
            AND ca.status = '0' AND q.Questionario_Inicio >= '$dataInicio' AND q.Questionario_Inicio <= '$dataFim'
            GROUP BY Categoria_Nome;";

$resultadoNotas = mysqli_query($conn, $consulta);

// Verifica se a consulta teve sucesso
if ($resultadoNotas) {
    $categoriasBonsDesempenhos = array();
    $categoriasPontosAMelhorar = array();

    while ($rowNota = mysqli_fetch_assoc($resultadoNotas)) {
        $categoria = $rowNota['Categoria_Nome'];
        $mediaNota = $rowNota['MediaNota'];

        if ($mediaNota >= 50) {
            $categoriasBonsDesempenhos[] = $categoria;
        } else {
            $categoriasPontosAMelhorar[] = "" . $categoria;
        }
    }

    $html .= '<h2>Feedback</h2>';
    $html .= '<p>Ao final da avaliação, foi constatado pelo sistema Autorating que o(a) colaborador(a) <b>' . $nomecolaborador . '</b> demonstrou um bom domínio nas categorias: <b>' . implode(', ', $categoriasBonsDesempenhos) . '</b> durante esse período.</p>';
    
    if (!empty($categoriasPontosAMelhorar)) {
        $html .= '<p>Entretanto, há necessidade de uma atenção nas seguintes categorias: <b>' . implode(', ', $categoriasPontosAMelhorar) . '</b>.</p>';
    }
} else {
    $html .= '<h2>Feedback</h2>';
    $html .= '<p>Erro na consulta ao banco de dados para obter as notas das categorias.</p>';
}

$html .= '<p>Equipe <b>TECHNOTRIBE</b></p>';



// Carregue o HTML no Dompdf
$dompdf->loadHtml($html);

// Renderize o PDF
$dompdf->render();

// Saída do PDF para o navegador ou salvamento em arquivo
$dompdf->stream(' '. $nomecolaborador .' relatorio '. date('d-m-y') .'.pdf');




} else {
    echo "Os dados do formulário não foram fornecidos corretamente.";
}


?>

