<?php
include('../../../LOGOFF/arearestrita.php');
include('../../../CONEXAOPHP/conexao.php');


$cpf = $_SESSION['cpf'];

$procedure = "select idTB_Gestor, Gestor_Foto from TB_Gestor where Gestor_CPF = '$cpf'";

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



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Avaliações Lançadas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../PROFILE/assets/bootstrap/css/profile.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../../../LOGIN/assets/img/AUTORATING.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
        <a href="../../../LOGOFF/verifica_autenticacao.php" id="btn-sair" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a> 
    </header>
    <main>
        <div class="l-navbar" id="nav-bar"> 
            <nav class="nav">
                <div> <a href="../../LOGIN/teladelogin.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                <div  class="img m-3"> 
                <img class="rounded-circle mb-3 mt-4" src="../../Colegas/assets/img/avatar.png" width="160" height="160" id="fotomenu">
                </div>
                <hr>
                    <div class="nav_list mt-4">
                        <a href="../../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                        <a href="../../COLEGAS/colegas.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
                        <a href="../../PESQUISAS/Base/Pesquisas.php" class="nav_link active"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a> 
                        <a href="../../Dashboard/dashboard.php" class="nav_link "> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="../../profile/profile.php" class="nav_link "> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div> 
            </nav>
        </div>

        <br>
        <br>
        <br>
        <blockquote class="blockquote text-center">
            <h3 class="mb-1 p-4" >Gerenciamento de Avaliações</h3>
        </blockquote>

        <?php
   
                if (isset($_SESSION['avaliacaocriada'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show col-6" role="alert">
                        <strong>Avaliação Lançada com sucesso!</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo $_SESSION['avaliacaocriada'];
                    unset($_SESSION['avaliacaocriada']);
                }

                ?>

                <?php
                
                if (isset($_SESSION['errocriaravaliacao'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show col-6" role="alert">
                        <strong>Erro ao criar avaliação!</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo $_SESSION['errocriaravaliacao'];
                    unset($_SESSION['errocriaravaliacao']);
                }

                ?>
      

            <div id="wrapper mb- p-4">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class=" m-0 fw-bold" style=" color: rgb(1, 70, 102);">Avaliações Lançadas pelo Gestor</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                        <a href="CRUD_pesquisas/insert_pesquisas.php"><button type="button" class="btn btn-success">Adicionar Avaliação <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16">
                                        <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627z"/>
                                        </svg>
                                            </button></a>
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
                                                    <th scope="col">Data de Inicio</th>
                                                    <th scope="col">Data do Fim</th>
                                                    <th scope="col">Numero de Perguntas</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <?php 
                                             

                                                $procedure = "SELECT *
                                                FROM tb_gestor AS g
                                                INNER JOIN tb_questionario AS q
                                                ON g.idTB_Gestor  = q.TB_Gestor_idTB_Gestor 
                                                WHERE q.TB_Gestor_idTB_Gestor = '$idTB_Gestor'";
                                  

                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn)); 

                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $Questionario_Inicio  = $dados['Questionario_Inicio'];
                                                    $Questionario_Fim  = $dados['Questionario_Fim'];
                                                    $Questionario_Qta_Perguntas = $dados['Questionario_Qta_Perguntas'];
                                                    $Questionario_Descricao  = $dados['Questionario_Descricao'];
                                                    $Questionario_Status =  $dados['Questionario_Status'];
                                                    $idTB_Questionario  =  $dados['idTB_Questionario'];
                                                    
                                                    ?>

                                                <tr>
                                                     <td><?php echo $idTB_Questionario   ?></td>
                                                     <td><?php echo substr($Questionario_Descricao, 0, 20)   ?></td>
                                                    <td><?php echo $Questionario_Inicio  ?></td>
                                                    <td><?php echo $Questionario_Fim  ?></td>
                                         
                                                    <td><?php echo $Questionario_Qta_Perguntas  ?></td>
                                              
                                             
                                            
                
                                                    <td>
                                                    
                                                          
                                                    <span class="badge badge-primary rounded-pill d-inline">Disponivel</span>
                                                
                                                    </td>
                                                </tr> 
                                           <?php } ?>
                                            </tbody>
                                       
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 align-self-center">
                                            <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Total: <?php $contar  ?></p>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Adicione aqui quaisquer outros elementos ou conteúdo que deseja exibir -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <footer class="sticky-footer">
                        <div class="container my-auto">
                            <div class="text-center my-auto copyright"><span>©TECHNOTRIBEMLV2023</span></div>
                        </div>
                    </footer>
                </div>
               
            </div>

    

            

    </main>

    <!-- ... (scripts JavaScript) ... -->
</body>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="../../PROFILE/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>