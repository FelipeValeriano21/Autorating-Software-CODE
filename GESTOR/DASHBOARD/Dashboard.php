<?php
include('../../LOGOFF/verifica_credencial.php');
include '../../ConexaoPHP/conexao.php';

$cpf = $_SESSION['cpf'];

$procedure = "SELECT * FROM tb_gestor WHERE Gestor_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $foto = $dados['Gestor_Foto'];

    $quantidade_de_caracteres = 18; 
    $tratacaminhoimagem = substr($foto, - $quantidade_de_caracteres);
    
    $idTB_Gestor = $dados['idTB_Gestor']; 
    if($tratacaminhoimagem==""){
        $tratacaminhoimagem = "avatar.png";
    }

}

?>


<?php 

$procedure = "SELECT count(*) FROM tb_questionario  WHERE TB_Gestor_idTB_Gestor = '$idTB_Gestor'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

if ($sql) {
    // Recupere o valor do COUNT
    $row = mysqli_fetch_row($sql);

    // Acesse o primeiro elemento do array (índice 0) para obter o valor do COUNT
    $countValue = $row[0];

    // Agora você pode usar $countValue para acessar o valor do COUNT

}
?>

<?php 

$procedure = "SELECT count(*) FROM tb_questoes  WHERE TB_Gestor_idTB_Gestor = '$idTB_Gestor'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

if ($sql) {

    $row = mysqli_fetch_row($sql);


    $countquestion = $row[0];


}
?>


<?php 

$procedure = "SELECT count(*) FROM tb_colaborador  WHERE TB_Gestor_idTB_Gestor = '$idTB_Gestor'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

if ($sql) {

    $row = mysqli_fetch_row($sql);


    $countemployer = $row[0];


}
?>

<?php 

$consulta = "SELECT c.colaborador_nome, AVG(q.Resultado_Final) AS media_notas
            FROM tb_gestor g
            JOIN tb_colaborador c ON g.idTB_Gestor = c.TB_Gestor_idTB_Gestor 
            JOIN tb_colaborador_associa_tb_questionario q ON c.idTB_Colaborador = q.TB_Colaborador_idTB_Colaborador
            WHERE g.idTB_Gestor = $idTB_Gestor
            GROUP BY c.colaborador_nome
            ORDER BY media_notas DESC
            LIMIT 1";

$resultado = mysqli_query($conn, $consulta) or die(mysqli_error($conn));

if ($row = mysqli_fetch_assoc($resultado)) {
    $colaborador = $row['colaborador_nome'];
    $media_notas = $row['media_notas'];


} else {
    echo "Nenhum colaborador encontrado para o gestor selecionado.";
      $colaborador = "Não há no momento";
}



?>


<?php 
$consulta = "SELECT c.colaborador_nome, AVG(q.Resultado_Final) AS media_notas
            FROM tb_gestor g
            JOIN tb_colaborador c ON g.idTB_Gestor = c.TB_Gestor_idTB_Gestor 
            JOIN tb_colaborador_associa_tb_questionario q ON c.idTB_Colaborador = q.TB_Colaborador_idTB_Colaborador
            WHERE g.idTB_Gestor = $idTB_Gestor
            GROUP BY c.colaborador_nome
            ORDER BY media_notas DESC
            LIMIT 7";

$resultado = mysqli_query($conn, $consulta) or die(mysqli_error($conn));
?>

<?php 

$procedure = "SELECT avg(Resultado_Final) as mediadecolaboradores FROM  tb_colaborador_associa_tb_questionario INNER JOIN tb_questionario ON tb_colaborador_associa_tb_questionario.TB_Questionario_idTB_Questionario = tb_questionario.idTB_Questionario WHERE tb_questionario.TB_Gestor_idTB_Gestor = $idTB_Gestor";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $mediadecolaboradores = $dados['mediadecolaboradores'];
}

?>
<?php

$query = "SELECT MIN(Resultado_Final) as minimo FROM tb_colaborador_associa_tb_questionario INNER JOIN tb_questionario ON tb_colaborador_associa_tb_questionario.TB_Questionario_idTB_Questionario = tb_questionario.idTB_Questionario WHERE tb_questionario.TB_Gestor_idTB_Gestor = $idTB_Gestor";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($result)) {
    $valormin = $dados['minimo'];
}

?>
<?php

$query = "SELECT MAX(Resultado_Final) as maximo FROM tb_colaborador_associa_tb_questionario INNER JOIN tb_questionario ON tb_colaborador_associa_tb_questionario.TB_Questionario_idTB_Questionario = tb_questionario.idTB_Questionario WHERE tb_questionario.TB_Gestor_idTB_Gestor = $idTB_Gestor";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($result)) {
    $valormax = $dados['maximo'];
}

?>

<?php
$query = "
SELECT AVG(Resultado_Final) AS media
FROM tb_colaborador_associa_tb_questionario;
";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($result)) {
    $media = $dados['media'];
}

$query = "
SELECT AVG((Resultado_Final - $media) * (Resultado_Final - $media)) AS variancia
FROM tb_colaborador_associa_tb_questionario
INNER JOIN tb_questionario ON tb_colaborador_associa_tb_questionario.TB_Questionario_idTB_Questionario = tb_questionario.idTB_Questionario
WHERE tb_questionario.TB_Gestor_idTB_Gestor = $idTB_Gestor;
";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($result)) {
    $variancia = $dados['variancia'];

    $desvio =  sqrt($variancia);

    $indice_coerencia = ($desvio / $media);
}
?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
     <link rel="shortcut icon" type="imagex/png" href="../../LOGIN/assets/img/AUTORATING.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
        <a href="../../LOGOFF/verifica_autenticacao.php" id="btn-sair" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a> 
   
    </header>
    <main>
    <div class="l-navbar" id="nav-bar"> 
        <nav class="nav">
            <div> <a href="../../LOGIN/teladelogin.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
               <div  class="img m-3"> 
               <img class="rounded-circle mb-3 mt-4" src="../Colegas/assets/img/avatar.png" width="160" height="160" id="fotomenu">
               
              </div>
               <hr>
                <div class="nav_list mt-4">
                     <a href="../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                     <a href="../COLEGAS/colegas.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
                     <a href="../PESQUISAS/Base/Pesquisas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a> 
                     <a href="Dashboard.php" class="nav_link active"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                     <a href="../PROFILE/profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
            </div> 
        </nav>
    </div>

    

    <main>

    <br>
    <br>
    <br>
      <blockquote class="blockquote text-center">
        <h3 class="mb-1 p-4" >Dashboard do Gestor   </h3>
      </blockquote>

      <hr>

      <div id="wrapper">
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
           
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-primary py-2" style="color: rgb(0,30,255);">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="color: rgb(0, 87, 127);">Questionarios Criados</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo  $countValue; ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-sticky-note fa-2x text-gray-300" style="color: rgb(0, 87, 127);"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span style="color: rgb(0, 87, 127);">Colaborador Destaque</span></div>
                                            <div class="text-dark h5 mb-0"><span><?php echo $colaborador ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-star fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span style="color: rgb(0, 87, 127);">N° PErguntas criadas</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo $countquestion ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-question-circle fa-2x text-gray-300" style="color: rgb(0, 87, 127);"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="color: rgb(0, 87, 127);">N° de COlaboradores</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $countemployer ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-6">
                            <div class="card shadow mb-5">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Colaboradores em destaques</h6>
                                    <div class="dropdown no-arrow">
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                $labels = array();
                                $data = array();

                                while ($row = mysqli_fetch_assoc($resultado)) {
                                    $labels[] = $row['colaborador_nome'];
                                    $data[] = $row['media_notas'];
                                }
                                ?>

                                <div class="card-body">
                                    <canvas id="myChart" style="height: 400px;"></canvas>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                <script>
                                    var ctx = document.getElementById('myChart').getContext('2d');
                                    var chart = new Chart(ctx, {
                                        type: 'bar',
                                        data: {
                                            labels: <?php echo json_encode($labels); ?>,
                                            datasets: [{
                                                label: 'Média de Notas',
                                                data: <?php echo json_encode($data); ?>,
                                                backgroundColor: '#014666',
                                                borderColor: '#4e73df',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            legend: {
                                                display: false
                                            },
                                            title: {
                                                fontStyle: 'bold'
                                            },
                                            scales: {
                                                xAxes: [{
                                                    ticks: {
                                                        fontStyle: 'normal'
                                                    }
                                                }],
                                                yAxes: [{
                                                    ticks: {
                                                        fontStyle: 'normal',
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="col-lg-12 col-xl-6">
                        <div class="form-group mb-3"><label class="form-label" for="from-calltime" style="color:#014666">Consulta Personalizada</label>
                            <div class="input-group"><select class="form-select" id="from-calltime-8" name="from-calltime-8" onchange="atualizarGrafico()">
                                    <optgroup label="Escolha um colaborador">
                                    <?php 
                        
                                        $procedure = "select * from tb_colaborador where TB_Gestor_idTB_Gestor = '$idTB_Gestor'";
                                        $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
                                        while ($dados = mysqli_fetch_assoc($sql)){
                                            $idTB_Colaborador   = $dados['idTB_Colaborador'];
                                            $Colaborador_Nome = $dados['Colaborador_Nome'];

                                        ?>
                                        <option value="<?php echo $idTB_Colaborador  ?>" name = "colaborador<?php echo $idTB_Colaborador  ?>"  selected="" id="colaborador"><?php echo $Colaborador_Nome ?></option>

                                        <?php } ?>
                                    </optgroup>
                                </select></div>
                                <br>
                        </div>
                            <div class="card shadow mb-5">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Consulta colaborador</h6>
                                    <div class="dropdown no-arrow">
                                        <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                            <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item" href="#">&nbsp;Another action</a>
                                            <div class="dropdown-divider"></div><a class="dropdown-item" href="#">&nbsp;Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="card-body">
                                    <canvas id="myChart2" style="height: 285px;"></canvas>
                                </div>
                                <script>
                                    var ctx = document.getElementById('myChart2').getContext('2d');
                                    var chart = new Chart(ctx, {
                                        type: 'line',
                                        data: {
                                            labels: <?php echo json_encode($labels); ?>,
                                            datasets: [{
                                                label: 'Desempenho individual',
                                                data: <?php echo json_encode($data); ?>,
                                                backgroundColor: '#014666',
                                                borderColor: '#4e73df',
                                                borderWidth: 1
                                            }]
                                        },
                                        options: {
                                            maintainAspectRatio: false,
                                            legend: {
                                                display: false
                                            },
                                            title: {
                                                fontStyle: 'bold'
                                            },
                                            scales: {
                                                xAxes: [{
                                                    ticks: {
                                                        fontStyle: 'normal'
                                                    }
                                                }],
                                                yAxes: [{
                                                    ticks: {
                                                        fontStyle: 'normal',
                                                        beginAtZero: true
                                                    }
                                                }]
                                            }
                                        }
                                    });
                                </script>
                            </div>
                        </div>
                
                        
                    </div>
                    <div class="row">
                        <div class="col-lg-6 mb-4">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary fw-bold m-0">Relatório Personalizado</h6>
                                </div>
                                <div class="card-body">
                                <div class="col-11">
                            <h5>Gerar relatório</h5>
                            <br>
                            <div class="form-group">

                        <form action="gerarrelatorio.php" method="GET">
                                <label for="birthday1">Data de início:</label>
                                <input type="date" id="birthday1" name="data_inicio">
                                
                                <label for="birthday2">Data do fim:</label>
                                <input type="date" id="birthday2" name="data_fim">
                                <br>
                                <br>
                                
                                <label for="from-calltime-8">Escolha um colaborador:</label>
                                <select class="" id="colaboradorrelatorio" name="colaboradorrelatorio">
                                    <?php 
                                        $procedure = "select * from tb_colaborador where TB_Gestor_idTB_Gestor = '$idTB_Gestor'";
                                        $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
                                        while ($dados = mysqli_fetch_assoc($sql)){
                                            $idTB_Colaborador = $dados['idTB_Colaborador'];
                                            $Colaborador_Nome = $dados['Colaborador_Nome'];
                                    ?>
                                    <option value="<?php echo $idTB_Colaborador; ?>" name="colaborador<?php echo $idTB_Colaborador; ?>" selected="" id="colaborador"><?php echo $Colaborador_Nome; ?></option>
                                    <?php } ?>
                                   
                                </select>
                                
                            <br>
                            <br>
                            <input class="btn btn-primary" type="submit" value="Gerar Relatório">
                            </form>
                            </div>             
                        </div>
                             
                                </div>
                            </div>
                            <div class="card shadow mb-4"></div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-lg-6 mb-4">
                                    <div class="card text-white  shadow" style="background-color: #014666;">
                                        <div class="card-body">
                                            <p class="m-0">MÉDIA GERAL</p>
                                            <p class="text-white-50 small m-0"><?php echo $mediadecolaboradores ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                <div class="card text-white shadow "  style="background-color: #014666;">
                                        <div class="card-body">
                                            <p class="m-0">INDICE DE COERÊNCIA</p>
                                            <p class="text-white-50 small m-0"><?PHP echo  $indice_coerencia ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                <div class="card text-white shadow"  style="background-color: #014666;">
                                        <div class="card-body">
                                            <p class="m-0">NOTA MININA</p>
                                            <p class="text-white-50 small m-0"><?php echo $valormin ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                <div class="card text-white shadow"  style="background-color: #014666;">
                                        <div class="card-body">
                                            <p class="m-0">DESVIO PADRÃO</p>
                                            <p class="text-white-50 small m-0"><?php echo $desvio ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                <div class="card text-white shadow"  style="background-color: #014666;">
                                        <div class="card-body">
                                            <p class="m-0">VARIÂNCIA</p>
                                            <p class="text-white-50 small m-0"><?PHP echo $variancia ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4">
                                <div class="card text-white shadow"  style="background-color: #014666;">
                                        <div class="card-body">
                                            <p class="m-0">NOTA MAXIMA</p>
                                            <p class="text-white-50 small m-0"><?PHP echo  $valormax ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


                        


            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © AUTORATING 2023</span></div>
                </div>
            </footer>
        </div>
    </div>
    </main>
</body>


<script>

function atualizarGrafico() {
    var select = document.getElementById('from-calltime-8');
    var colaboradorId = select.value;

   

  
    fetch('consultagrafico.php?colaboradorId=' + colaboradorId)
        .then(response => response.json())
        .then(data => {
            if (data !== null) {
                
                chart.data.labels = data.labels;
                chart.data.datasets[0].data = data.dados;
                chart.update();
                console.log(data)
            } else {
                
                console.error('Os dados do colaborador não foram encontrados.');
            }

        })
        .catch(error => console.error('Erro ao buscar dados do servidor: ' + error));
}

</script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>
