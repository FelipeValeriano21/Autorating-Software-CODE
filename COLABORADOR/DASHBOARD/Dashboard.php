<?php
include '../../ConexaoPHP/conexao.php';
include('../../LOGOFF/verifica_credencial.php');


$cpf = $_SESSION['cpf'];

// Consulta para obter dados do colaborador
$procedure = "SELECT * FROM tb_colaborador WHERE Colaborador_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $idTB_Colaborador = $dados['idTB_Colaborador']; 
    $foto = $dados['Colaborador_Foto'];
    $TB_Gestor_idTB_Gestor = $dados['TB_Gestor_idTB_Gestor'];

    $quantidade_de_caracteres = 18; 
    $tratacaminhoimagem = substr($foto, - $quantidade_de_caracteres);
}

?>



<?php 

$procedure = "SELECT avg(Resultado_Final) as mediacolaborador FROM  tb_colaborador_associa_tb_questionario WHERE TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $media_colaborador = $dados['mediacolaborador'];
}

?>

<?php 

$procedure = "SELECT max(Resultado_Final) as maiornota FROM  tb_colaborador_associa_tb_questionario WHERE TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $maiornota = $dados['maiornota'];
}

?>

<?php 

$procedure = "SELECT count(*) as concluidas FROM  tb_colaborador_associa_tb_questionario WHERE TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador' and status = '0'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $concluidas = $dados['concluidas'];
}

?>

<?php 

$procedure = "SELECT count(*) as naoconcluidas FROM  tb_colaborador_associa_tb_questionario WHERE TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador' and status = '1'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $naoconcluidas = $dados['naoconcluidas'];
}

?>



<?php 

$procedure = "SELECT min(Resultado_Final) as menornota FROM  tb_colaborador_associa_tb_questionario WHERE TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $menornota = $dados['menornota'];
}

?>


<?php 

$procedure = "WITH AvgResultados AS (
    SELECT
      tb_colaborador.idTB_Colaborador AS Colaborador_ID,
      AVG(tb_colaborador_associa_tb_questionario.resultado_final) AS Avg_Resultado_Final
    FROM tb_colaborador_associa_tb_questionario
    INNER JOIN tb_colaborador ON tb_colaborador.idTB_Colaborador = tb_colaborador_associa_tb_questionario.TB_Colaborador_idTB_Colaborador
    INNER JOIN tb_questionario ON tb_questionario.idTB_Questionario = tb_colaborador_associa_tb_questionario.TB_Questionario_idTB_Questionario
    WHERE tb_questionario.TB_Gestor_idTB_Gestor = '$TB_Gestor_idTB_Gestor'
    GROUP BY tb_colaborador.idTB_Colaborador
  ),
  
  PosicaoColaborador AS (
    SELECT
      Colaborador_ID,
      RANK() OVER (ORDER BY Avg_Resultado_Final DESC) AS posicao
    FROM AvgResultados
  )
  
  SELECT posicao
  FROM PosicaoColaborador
  WHERE Colaborador_ID = '$idTB_Colaborador';";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $ranking = $dados['posicao'];


}

if(empty($ranking)){

    $ranking = "Ainda sem ranking";

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
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
               <div  class="img m-3"> 
               <img class="rounded-circle mb-3 mt-4" src="../UPLOADS_IMAGENS/<?php echo $tratacaminhoimagem?>" width="160" height="160" id="fotomenu">
               
              </div>
               <hr>
                <div class="nav_list mt-4">
                     <a href="../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                     <a href="../COLEGAS/colegas.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
                     <a href="../REALIZADAS/realizadas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a> 
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
        <h3 class="mb-1 p-4" >Dashboard do colaborador</h3>
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
                                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span style="color: rgb(0,65,255);">Nota média</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $media_colaborador ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-sticky-note fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Maior nota</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $maiornota ?></span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-arrow-circle-up fa-2x text-gray-300" style="color: rgb(3,37,247);"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-info py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span style="color: #800000">Menor nota</span></div>
                                            <div class="row g-0 align-items-center">
                                                <div class="col-auto">
                                                    <div class="text-dark fw-bold h5 mb-0 me-3"><span><?php echo $menornota ?></span></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-arrow-circle-down fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-start-warning py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col me-2">
                                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span style="color: rgb(0,65,255);">Ranking do departamento</span></div>
                                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo $ranking ?>°</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-users fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Analise Detalhada</h6>
                               
                                </div>
                                <div class="card-body">
                                    <div>  <canvas id="myLineChart"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary fw-bold m-0">Avaliações Concluidas</h6>
                            
                                </div>
                                <div class="card-body">
                                    <div class="chart-area"><canvas data-bss-chart="{&quot;type&quot;:&quot;doughnut&quot;,&quot;data&quot;:{&quot;labels&quot;:[&quot;Concluidas&quot;,&quot;A fazer&quot;],&quot;datasets&quot;:[{&quot;label&quot;:&quot;&quot;,&quot;backgroundColor&quot;:[&quot;#00577F&quot;,&quot;#800000&quot;],&quot;borderColor&quot;:[&quot;#ffffff&quot;,&quot;#ffffff&quot;],&quot;data&quot;:[&quot;<?php echo  $concluidas  ?>&quot;,&quot;<?php echo  $naoconcluidas  ?>&quot;]}]},&quot;options&quot;:{&quot;maintainAspectRatio&quot;:false,&quot;legend&quot;:{&quot;display&quot;:false,&quot;labels&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}},&quot;title&quot;:{&quot;fontStyle&quot;:&quot;normal&quot;}}}"></canvas></div>
                                    <div class="text-center small mt-4"><span class="me-2"><i class="fas fa-circle " style="color: #00577F"></i>&nbsp;Concluidas</span><span class="me-2"><i class="fas fa-circle" style="color: #800000"></i>&nbsp;A fazer</span></div>
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

  <!--

 <footer>   
      <div class="text-center p-4" style=" background-color: rgb(8, 87, 156); color: white;">
      © 2023 Copyright: TECHNOTRIBE MLV
      </div>
  </footer>


  -->
  
 
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" ></script>

<script>
  $(document).ready(function() {
    $.ajax({
      url: 'consultadashboard.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        var labels = data.map(function(item) {
          return item.TB_Questionario_idTB_Questionario;
        });
        var values = data.map(function(item) {
          return item.Resultado_Final;
        });

        var ctx = document.getElementById("myLineChart").getContext('2d');
        var myLineChart = new Chart(ctx, {
          type: 'line',
          data: {
            labels: labels,
            datasets: [{
              label: "Avaliações realizadas",
              data: values,
              borderColor: 'rgb(0, 87, 127)',
              borderWidth: 1,
              fill: false
            }]
          },
          options: {
            scales: {
              yAxes: [{
                ticks: {
                  beginAtZero: true
                }
              }]
            }
          }
        });
      }
    });
  });
</script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>
