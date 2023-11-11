<?php
include '../../ConexaoPHP/conexao.php';
include('../../LOGOFF/verifica_credencial.php');

$cpf = $_SESSION['cpf'];

$procedure = "select TB_Gestor_idTB_Gestor from TB_Colaborador where Colaborador_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)){
    $idTB_Gestor = $dados['TB_Gestor_idTB_Gestor'];
}
?>

<?php
include '../../ConexaoPHP/conexao.php';

// Consulta para obter dados do colaborador
$procedure = "SELECT * FROM tb_colaborador WHERE Colaborador_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $fotocolab = $dados['Colaborador_Foto'];

    $quantidade_de_caracteres = 19; 
    $tratacaminho = substr($fotocolab, - $quantidade_de_caracteres);



}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Colegas de Departamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="image/png" href="../../LOGIN/assets/img/AUTORATING.png">
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
                    <img class="rounded-circle mb-3 mt-4" src="../UPLOADS_IMAGENS/<?php echo $tratacaminho?>" width="160" height="160" id="fotomenu">
                    </div>
                    <hr>
                    <div class="nav_list mt-4">
                        <a href="../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                        <a href="colegas.php" class="nav_link active" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
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
                <h4 class="mb-1 p-4" >Meu Departamento</h4>
            </blockquote>

            <hr>
            <div id="wrapper mb- p-4">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style=" color: rgb(1, 70, 102);">Colegas de Departamento</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap"></div>
                                        <div class="col-md-6">
                                            <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">*</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Telefone</th>
                                                    <th scope="col">Função</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $procedure = "select * from TB_Colaborador where TB_Gestor_idTB_Gestor = ' $idTB_Gestor'";
                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $idTB_Colaborador = $dados['idTB_Colaborador'];
                                                    $nome = $dados['Colaborador_Nome']; 
                                                    $email = $dados['Colaborador_Email'];
                                                    $telefone = $dados['Colaborador_Telefone'];
                                                    $funcao = $dados['Colaborador_Funcao'];
                                                    $foto = $dados['Colaborador_Foto'];

                                                    $quantidade_de_caracteres = 18; 
                                                    $tratacaminhoimagem = substr($foto, - $quantidade_de_caracteres);
                                               
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="../UPLOADS_IMAGENS/<?php echo$tratacaminhoimagem?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                    </td>
                                                    <td><?php echo $nome ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $telefone ?></td>
                                                    <td><?php echo  $funcao ?></td>
                                                    <td></td>
                                                </tr> 
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 align-self-center"></div>
                                        <div class="col-md-6"></div>
                                    </div>     
                                </div>
                            </div>

                            <br>
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class="m-0 fw-bold" style=" color: rgb(1, 70, 102);">Gestores de Departamento</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap"></div>
                                        <div class="col-md-6">
                                            <div class="text-md-end dataTables_filter" id="dataTable_filter">
                                             
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">*</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Telefone</th>
                                              
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                $procedure = "select * from TB_Gestor where idTB_Gestor = ' $idTB_Gestor'";
                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $idTB_Gestor = $dados['idTB_Gestor'];
                                                    $nome = $dados['Gestor_Nome']; 
                                                    $email = $dados['Gestor_Email'];
                                                    $telefone = $dados['Gestor_Telefone'];
                                                    $fotogest = $dados['Gestor_Foto'];
                                          
                                          
                                                ?>
                                                <tr>
                                                    <td>
                                                        <img src="../../GESTOR/UPLOADS_IMAGENS/<?php echo$fotogest ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" />
                                                    </td>
                                                    <td><?php echo $nome ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $telefone ?></td>
                                                </tr> 
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 align-self-center"></div>
                                        <div class="col-md-6"></div>
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
    </div>
</main>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
