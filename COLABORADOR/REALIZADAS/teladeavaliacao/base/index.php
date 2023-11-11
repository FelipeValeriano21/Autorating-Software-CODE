
<?php
include '../../../../ConexaoPHP/conexao.php';
session_start();

$cpf = $_SESSION['cpf'];

$procedure = "SELECT * FROM tb_colaborador WHERE Colaborador_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $foto = $dados['Colaborador_Foto'];
    $TB_Gestor_idTB_Gestor  = $dados['TB_Gestor_idTB_Gestor'];
}


if (isset($_GET['TB_Questionario'])) {
    $TB_Questionario_idTB_Questionario = $_GET['TB_Questionario'];

} else {
}


if (isset($_GET['idTB_Colaborador'])) {
    $idTB_Colaborador = $_GET['idTB_Colaborador'];

} else {
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de Avaliação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
    <link rel="shortcut icon" type="imagex/png" href="../../../../Login/assets/img/AUTORATING.png">

    <style>
  .md-stepper-horizontal {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .md-step {
    flex: 0 0 calc(20% - 5px); /* Defina a largura apropriada */
  }
</style>

</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
  
    </header>
    <main>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                    <div  class="img m-3">
                        <img class="rounded-circle mb-3 mt-4" src="../<?php echo $foto?>" width="160" height="160" id="fotomenu">
                    </div>
                    <hr>
                    <div class="nav_list mt-4">
                        <a href="" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a>
                        <a href="" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a>
                        <a href="" class="nav_link active"> <i class='bx bx-check nav_icon '></i> <span class="nav_name">Realizadas</span> </a>
                        <a href="" class="nav_link "> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div>
            </nav>
        </div>
        <main>
            <br>
            <br>
            <br>
            <blockquote class="blockquote text-center">
                <h3 class="mb-1 p-4" >Avaliação de colaborador iniciada</h3>
            </blockquote>
            <section>
                <div class="container">
                    <div class="row stepper">
                        <div class="col">
                            <div class="md-stepper-horizontal orange">
                                <?php
                                $procedure = "SELECT Questionario_Qta_Perguntas FROM tb_questionario WHERE idTB_Questionario = '$TB_Questionario_idTB_Questionario'";
                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
                                while ($dados = mysqli_fetch_assoc($sql)) {
                                    $Questionario_Qta_Perguntas = $dados['Questionario_Qta_Perguntas'];
                                }
                                for ($i = 1; $i <= $Questionario_Qta_Perguntas; $i++) {
                                    echo '<div class="md-step active current" onclick="chamarquestao(this)" id="Questão ' . $i . '">
                                          <div class="md-step-circle grey"><span>' . $i . '</span></div>
                                          <div class="md-step-title"><span><strong>Questão ' . $i . '</strong></span></div>
                                          <div class="md-step-bar-left"></div>
                                          <div class="md-step-bar-right"></div>
                                      </div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <br>
            <section class="container">
                <div class="mx-0 mx-sm-auto">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <p>
                                    <strong id="indice">Questão 1</strong>
                                </p>
                            </div>

                            <form class="px-4" action="">
                                <?php
                                $gabaritoQuestionario = array();
                                $selectedQuestions = array(); // Array para rastrear as questões selecionadas
                                $procedure = "SELECT tb_questoes.*, tb_questionario_has_tb_categoria.*
                                    FROM tb_questoes
                                    INNER JOIN tb_questionario_has_tb_categoria ON tb_questoes.TB_Categoria_idTB_Categoria = tb_questionario_has_tb_categoria.TB_Categoria_idTB_Categoria
                                    WHERE tb_questionario_has_tb_categoria.TB_Questionario_idTB_Questionario = '$TB_Questionario_idTB_Questionario' AND tb_questoes.TB_Gestor_idTB_Gestor = '$TB_Gestor_idTB_Gestor'
                                    ORDER BY RAND()
                                    LIMIT $Questionario_Qta_Perguntas;
                                ";
                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

                                $indice = 0; // Variável para rastrear o índice da questão

                                while ($dados = mysqli_fetch_assoc($sql)) {
                                    $Questoes_Pergunta = $dados['Questoes_Pergunta'];
                                    $TB_Categoria_idTB_Categoria = $dados['TB_Categoria_idTB_Categoria'];
                                    $Questoes_A = $dados['Questoes_A'];
                                    $Questoes_B = $dados['Questoes_B'];
                                    $Questoes_C = $dados['Questoes_C'];
                                    $Questoes_D = $dados['Questoes_D'];

                                    $Questao_Correta = $dados['Questao_Correta'];
                                    array_push($gabaritoQuestionario, $Questao_Correta);
                                    

                                    // Verifica se a questão já foi selecionada
                                    if (!in_array($Questoes_Pergunta, $selectedQuestions)) {
                                        $selectedQuestions[] = $Questoes_Pergunta; // Adiciona a questão à lista de selecionadas
                                        $indice++; // Incrementa o índice da questão
                                        ?>
                                        <div class="questao" id="questao-<?php echo $indice; ?>"
                                            style="display: <?php echo ($indice == 1) ? 'block' : 'none'; ?>">
                                            <p><?php echo $Questoes_Pergunta ?></p>
                                            <hr />
                                            <p class="text-center"><strong>Escolha uma das opções:</strong></p>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="resposta-questao-<?php echo $indice; ?>" id="radio-questao-<?php echo $indice; ?>-1" value="A" />
                                                <label class="form-check-label" for="radio-questao-<?php echo $indice; ?>-1">
                                                    <?php echo $Questoes_A?>
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="resposta-questao-<?php echo $indice; ?>" id="radio-questao-<?php echo $indice; ?>-2" value="B"/>
                                                <label class="form-check-label" for="radio-questao-<?php echo $indice; ?>-2">
                                                    <?php echo $Questoes_B?>
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="resposta-questao-<?php echo $indice; ?>" id="radio-questao-<?php echo $indice; ?>-3" value="C" />
                                                <label class="form-check-label" for="radio-questao-<?php echo $indice; ?>-3">
                                                    <?php echo $Questoes_C?>
                                                </label>
                                            </div>
                                            <div class="form-check mb-2">
                                                <input class="form-check-input" type="radio" name="resposta-questao-<?php echo $indice; ?>" id="radio-questao-<?php echo $indice; ?>-4" value="D" />
                                                <label class="form-check-label" for="radio-questao-<?php echo $indice; ?>-4">
                                                    <?php echo $Questoes_D?>
                                                </label>
                                    
                                            </div>
                                        </div>
                                    <?php

                    

                                    }

                                    if ($indice >= $Questionario_Qta_Perguntas) {
                                        break; 
                                    }
                                }
                                ?>
                            </form>
                        </div>
                        <div class="card-footer text-end">
                            <button type="button" class="btn btn-primary" id="botaoanterior" style="background-color: rgb(0, 87, 127);" onclick="mostrarQuestaoAnterior()">Anterior</button>
                            <button type="button" class="btn btn-primary" id="proximobotao" style="background-color: rgb(0, 87, 127);" onclick="mostrarProximaQuestao()">Próxima</button>
                        </div>
                    </div>
                </div>
            </section>
        </main>
        <footer class="sticky-footer">
            <div class="container my-auto">
                <div class="text-center my-auto copyright"><span>©TECHNOTRIBEMLV2023</span></div>
            </div>
        </footer>
    </main>
    <!----------------------------------------------------------------------------------------------->
    <script>
     let questaoAtual = 1;
const totalQuestoes = <?php echo $Questionario_Qta_Perguntas; ?>;

document.getElementById("Questão " + questaoAtual).style.backgroundColor = "#e6e6e6";

function mostrarProximaQuestao() {
  
    if (questaoAtual < totalQuestoes) {
        document.getElementById('questao-' + questaoAtual).style.display = 'none';
        questaoAtual++;
        document.getElementById('questao-' + questaoAtual).style.display = 'block';
        document.getElementById('indice').innerHTML = "Questão " + questaoAtual;
        document.getElementById("botaoanterior").disabled = false;
        
        document.getElementById("Questão " + questaoAtual).style.backgroundColor = "#e6e6e6";
        document.getElementById("Questão " + (questaoAtual-1)).style.backgroundColor = "white";
      
    }
    
    if (questaoAtual === totalQuestoes) {
        document.getElementById("proximobotao").textContent = "Finalizar";
        document.getElementById("proximobotao").setAttribute("onclick", "finalizaravaliacao()");
    }
}

function mostrarQuestaoAnterior() {
    if (questaoAtual > 1) {
        document.getElementById('questao-' + questaoAtual).style.display = 'none';
        questaoAtual--;
        document.getElementById('questao-' + questaoAtual).style.display = 'block';
        document.getElementById('indice').innerHTML = "Questão " + questaoAtual;
        document.getElementById("proximobotao").textContent = "Próxima";
        document.getElementById("proximobotao").setAttribute("onclick", "mostrarProximaQuestao()");

        document.getElementById("Questão " + questaoAtual).style.backgroundColor = "#e6e6e6";
        document.getElementById("Questão " + (questaoAtual+1)).style.backgroundColor = "white";
        
    }
    
    if (questaoAtual === 1) {
        document.getElementById("botaoanterior").disabled = true;
    }
}

function finalizaravaliacao() {
    const vetorGabarito = [];
    alert("Avaliação finalizada.");

    for (let i = 1; i <= <?php echo $Questionario_Qta_Perguntas ?>; i++) {
       
        var respostaSelecionada = $('input[name="resposta-questao-' + i + '"]:checked').val();
        
        if (respostaSelecionada === undefined) {
            alert("Preencha a questão " + i);
        } else {
        

            vetorGabarito.push(respostaSelecionada)
        }
    }

    for (let i = 0; i <= vetorGabarito.length; i++) {

        console.log(vetorGabarito[i]);
    }


            const Questao_Correta = <?php echo json_encode($gabaritoQuestionario); ?>; // Seu array PHP
            const Colaborador = <?php echo json_encode($idTB_Colaborador); ?>;
            const NumeroQuestionario  = <?php echo json_encode($TB_Questionario_idTB_Questionario); ?>;

            const data = {
                vetorGabarito: vetorGabarito,
                Questao_Correta: Questao_Correta,
                Colaborador: Colaborador,
                NumeroQuestionario: NumeroQuestionario
            };

            const xhr = new XMLHttpRequest();
            xhr.open("POST", "verificaquestionario.php", true);
            xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8");
            xhr.send(JSON.stringify(data));

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    const respostaPHP = xhr.responseText;
                    console.log(respostaPHP);
                
                    window.location.href = '../../realizadas.php'; 
                }
             
             
     
            };



}



    </script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="assets/js/chart.min.min.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
