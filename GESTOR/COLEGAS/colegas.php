<?php
include('../../LOGOFF/verifica_credencial.php');
include '../../ConexaoPHP/conexao.php';


$cpf = $_SESSION['cpf'];

$procedure = "select idTB_Gestor, Gestor_Foto from TB_Gestor where Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $idTB_Gestor = $dados['idTB_Gestor'];
    $Foto = $dados['Gestor_Foto'];

    if($Foto == ""){

        $Foto = "assets/img/avatar.png" ;

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Equipe de departamento</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="image/png" href="../../LOGIN/assets/img/AUTORATING.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
    <!-- Adicione aqui quaisquer outras folhas de estilo (CSS) necessárias -->
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
        <a href="../../LOGOFF/verifica_autenticacao.php" id="btn-sair" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a>
    </header>
    <main>
        <!-- Início da barra de navegação lateral -->
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                    <div  class="img m-3"> 
                    <img class="rounded-circle mb-3 mt-4" width="160" height="160" id="fotomenu" src="<?php echo  $Foto ?>">
                    </div>
                    <hr>
                    <div class="nav_list mt-4">
                        <a href="../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                        <a href="../COLEGAS/colegas.php" class="nav_link active" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
                        <a href="../PESQUISAS/Base/Pesquisas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a> 
                        <a href="../DASHBOARD/Dashboard.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="../PROFILE/profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div> 
            </nav>
        </div>
        <!-- Fim da barra de navegação lateral -->

        <!-- Início do conteúdo principal -->
        <main>

        <br>
        <br>
        <br>
            <blockquote class="blockquote text-center">
                <h3 class="mb-1 p-4">Colaboradores do departamento</h3>
            </blockquote>


            <?php                    
                    if(isset($_SESSION['erros_camposvazios'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>PREENCHA TODOS OS CAMPOS!</strong> Erro ao editar colaborador
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        echo $_SESSION['erros_camposvazios'];
                        unset($_SESSION['erros_camposvazios']);
                    }
                    ?>

            <?php 
            if(isset($_SESSION['status_insert'])){ ?>
                <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                    <strong>Colaborador Cadastrado com sucesso!</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['status_insert'];
                unset($_SESSION['status_insert']);
            }
            ?>

            <?php 
            if(isset($_SESSION['status_editar'])){ ?>
                <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                    <strong>Colaborador Editado com sucesso!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['status_editar'];
                unset($_SESSION['status_editar']);
            }
            ?>

            <?php 
            if(isset($_SESSION['Desligadocomsucesso'])){ ?>
                <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                    <strong>Status do colaborador foi alterado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['Desligadocomsucesso'];
                unset($_SESSION['Desligadocomsucesso']);
            }
            ?>
                    <?php 
            if(isset($_SESSION['erroaodesligar'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Erro ao fazer essa ação!</strong> Tarefa não concluida
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['erroaodesligar'];
                unset($_SESSION['erroaodesligar']);
            }
            ?>

            <?php 
            if(isset($_SESSION['Errogenerico'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Algo deu errado!</strong> Tarefa não concluida
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['Errogenerico'];
                unset($_SESSION['Errogenerico']);
            }
            ?>

            <div id="wrapper mb- p-4">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class=" m-0 fw-bold" style=" color: rgb(1, 70, 102);">Integrantes do departamento</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                            <a href="CRUD_colegas/teladeinsert.php"><button type="button" class="btn btn-success">Adicionar colaborador <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                                <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                                                <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z"/>
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
                                                    <th scope="col">*</th>
                                                    <th scope="col">Nome</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Função</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">CPF</th>
                                                    <th scope="col">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                include '../../ConexaoPHP/conexao.php';

                                                $procedure = "select * from TB_Colaborador where TB_Gestor_idTB_Gestor = '$idTB_Gestor';";

                                                $contar = "select count(idTB_Colaborador) from TB_Colaborador; ";

                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $idTB_Colaborador = $dados['idTB_Colaborador'];
                                                    $nome = $dados['Colaborador_Nome']; 
                                                    $email = $dados['Colaborador_Email'];
                                                    $funcao = $dados['Colaborador_Funcao'];
                                                    $status = $dados['Colaborador_Status'];
                                                    $cpf = $dados['Colaborador_CPF'];
                                                    $foto = $dados['Colaborador_Foto'];

                                                    if($foto == ""){

                                                      $foto = "../assets/img/avatar.png" ;

                                                    }
                                                ?>

                                                <?php

                                                    if($status==1){
                                                        $situação = "Ligado";
                                                        $btnstatus = "Desativar";
                                                    }else{
                                                        $situação = "Desligado" ;
                                                        $btnstatus = "Ativar";
                                                    }

                                                    ?>

                                                <tr>
                                                    <td><img src="CRUD_colegas/<?php echo $foto ?>" alt="" style="width: 45px; height: 45px" class="rounded-circle" /></td>
                                                    <td><?php echo $nome ?></td>
                                                    <td><?php echo $email ?></td>
                                                    <td><?php echo $funcao ?></td>
                                                    <td><span class="badge badge-success rounded-pill d-inline"><?php echo $situação ?></span></td>
                                                    <td><?php echo $cpf ?></td>
                                                    <td>
                                                      <a class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $idTB_Colaborador?>" data-id="<?php echo $idTB_Colaborador?>"><?php echo $btnstatus ?></a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="DeleteModal<?php echo $idTB_Colaborador?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" >
                                                                    <div class="modal-content" >
                                                                        <div class="modal-header" style = "background-color: rgb(0, 87, 127); color: white;">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel" >Atenção</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Deseja mesmo mudar o status do colaborador <?php echo $idTB_Colaborador?>?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger">Cancelar</button>
                                                                            <a class="btn btn-primary" href="CRUD_colegas/desliga.php?idTB_Colaborador=<?php echo $idTB_Colaborador?>"  value="<?php echo $idTB_Colaborador?>">Mudar status</a>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <a class="btn btn-warning" href="CRUD_colegas/tela_update.php?idTB_Colaborador=<?php echo $idTB_Colaborador?>">Editar</a>
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
                                           
                                        </div>
                                        <div class="col-md-6">
                                           
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
        <!-- Fim do conteúdo principal -->
    </main>
    <!-- Adicione aqui quaisquer outros scripts JavaScript que deseja incluir -->
</body>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/script.min.js"></script>
<script src="../assets/js/chart.min.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>
