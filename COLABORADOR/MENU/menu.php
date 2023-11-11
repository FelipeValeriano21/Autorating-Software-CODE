<?php
include '../../ConexaoPHP/conexao.php';

include('../../LOGOFF/verifica_credencial.php');

$cpf = $_SESSION['cpf'];

// Consulta para obter dados do colaborador
$procedure = "SELECT * FROM tb_colaborador WHERE Colaborador_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $foto = $dados['Colaborador_Foto'];
    $nome = $dados['Colaborador_Nome'];
    $idTB_Colaborador = $dados['idTB_Colaborador'];

    $quantidade_de_caracteres = 18; 
    $tratacaminhoimagem = substr($foto, - $quantidade_de_caracteres);
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Autorating</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../../LOGIN/assets/img/AUTORATING.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
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
                     <a href="menu.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                     <a href="../COLEGAS/colegas.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
                     <a href="../REALIZADAS/realizadas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a> 
                     <a href="../DASHBOARD/Dashboard.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
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
      
      </blockquote>

      <div class="alert alert-warning alert-dismissible fade show col-4" data-aos="fade-right" role="alert" style="background-color: #4d9e58; color: white; border-radius: 0;">
      Bem-vindo(a) de volta colaborador(a) <strong><b><?php echo $nome ?></strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>


  <hr>

      <div id="wrapper mb- p-4">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class=" m-0 fw-bold" style=" color: rgb(1, 70, 102);">Avaliações Pendentes</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                       
                                        </div>
                                        <div class="col-md-6">
                                           
                                        </div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">ID</th>
                                                    <th scope="col">Descrição</th>
                                                    <th scope="col">Data Inicio</th>
                                                    <th scope="col">Data Término </th>
                                                    <th scope="col">Qtd de questões</th>
                                                    <th scope="col">Ação</th>
                                          
                                                </tr>
                                            </thead>
                                            <tbody> 
                                            <?php 
                                                

                                                $procedure = "SELECT *
                                                FROM tb_colaborador_associa_tb_questionario AS ca
                                                INNER JOIN tb_questionario AS q
                                                ON ca.TB_Questionario_idTB_Questionario  = q.idTB_Questionario
                                                WHERE ca.TB_Colaborador_idTB_Colaborador = '$idTB_Colaborador' and ca.status = '1' ;";
                                  

      
                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn)); 

                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $TB_Questionario_idTB_Questionario  = $dados['TB_Questionario_idTB_Questionario'];
                                                    $Questionario_Descricao  = $dados['Questionario_Descricao'];
                                                    $Questionario_Inicio = $dados['Questionario_Inicio'];
                                                    $Questionario_Fim  = $dados['Questionario_Fim'];
                                                    $Questionario_Qta_Perguntas =  $dados['Questionario_Qta_Perguntas'];
                                                    
                                                    ?>

                                                <tr>
                                                    <td><?php echo $TB_Questionario_idTB_Questionario  ?></td>
                                                    <td><?php echo $Questionario_Descricao  ?></td>
                                                    <td><?php echo $Questionario_Inicio  ?></td>
                                                    <td><?php echo $Questionario_Fim  ?></td>
                                                    <td><?php echo $Questionario_Qta_Perguntas  ?></td>
                                             
                                            
                                            
                                                    <td>
                                                    
                                                    <a class="btn btn-primary" href="../realizadas/teladeavaliacao/base/index.php?TB_Questionario=<?php echo $TB_Questionario_idTB_Questionario ?>&idTB_Colaborador=<?php echo $idTB_Colaborador ?>">Começar</a>

                                                        <script>
                                                        document.addEventListener('DOMContentLoaded', function () {
                                                            const deleteButtons = document.querySelectorAll('.delete-button');
                                                            const modalColaboradorId = document.getElementById('colaboradorId');
                                                            const idColaboradorInput = document.getElementById('id_colaborador');

                                                            deleteButtons.forEach(button => {
                                                                button.addEventListener('click', function () {
                                                                    const colaboradorId = button.getAttribute('data-id');
                                                                    modalColaboradorId.textContent = colaboradorId;
                                                                    idColaboradorInput.value = colaboradorId; // Define o valor do campo oculto

                                                                });
                                                            });
                                                        });
                                                        </script>
                                                    </td>
                                                </tr> 
                                           <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 align-self-center">
                                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite"></p>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Adicione aqui quaisquer outros elementos ou conteúdo que deseja exibir -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
             
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
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>
