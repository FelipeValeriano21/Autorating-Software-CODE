<?php
include('../../LOGOFF/verifica_credencial.php');
include('../../CONEXAOPHP/conexao.php');


$cpf = $_SESSION['cpf'];

$procedure = "select idTB_Gestor,Gestor_Foto from TB_Gestor where Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $idTB_Gestor = $dados['idTB_Gestor'];
    $Gestor_Foto = $dados['Gestor_Foto'];
    
    if($Gestor_Foto == ""){

        $Gestor_Foto = "assets/img/avatar.png";

    }
    
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perguntas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../PROFILE/assets/bootstrap/css/profile.css">
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
                        <a href="../Dashboard/dashboard.php" class="nav_link "> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="../profile/profile.php" class="nav_link "> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div> 
            </nav>
        </div>
        <br>
        <br>
        <br>
        
        <blockquote class="blockquote text-center">
            <h3 class="mb-1 p-4" >Gerenciamento de Perguntas</h3>
        </blockquote>

        
        <?php                    
                    if(isset($_SESSION['camposvazios_perguntas'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>PREENCHA TODOS OS CAMPOS!</strong> Erro ao cadastrar pergunta
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        echo $_SESSION['camposvazios_perguntas'];
                        unset($_SESSION['camposvazios_perguntas']);
                    }
                    ?>

            <?php 
            if(isset($_SESSION['status_Perguntacadastradasucesso'])){ ?>
                <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                    <strong>Pergunta Cadastrada com sucesso!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['status_Perguntacadastradasucesso'];
                unset($_SESSION['status_Perguntacadastradasucesso']);
            }
            ?>

            <?php 
            if(isset($_SESSION['status_editar_perguntas'])){ ?>
                <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                    <strong>Questão editada com sucesso!</strong> 
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['status_editar_perguntas'];
                unset($_SESSION['status_editar_perguntas']);
            }
            ?>

            <?php 
            if(isset($_SESSION['status_editar_perguntas_camposembranco'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Campos em branco!</strong> Erro ao editar a questão
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['status_editar_perguntas_camposembranco'];
                unset($_SESSION['status_editar_perguntas_camposembranco']);
            }
            ?>

            <?php 
            if(isset($_SESSION['Desligadocomsucesso'])){ ?>
                <div class="alert alert-success alert-dismissible fade show col-5" role="alert">
                    <strong>Status da pergunta foi mudado!</strong>
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
            if(isset($_SESSION['Perguntadesligadacomsucesso'])){ ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Pergunta desligada com sucesso!</strong> Não consta mais acessar o sistema
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['Perguntadesligadacomsucesso'];
                unset($_SESSION['Perguntadesligadacomsucesso']);
            }
            ?>
                  <?php 
            if(isset($_SESSION['errorgenericoquest'])){ ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Algo deu errado!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php
                echo $_SESSION['errorgenericoquest'];
                unset($_SESSION['errorgenericoquest']);
            }
            ?>


            


            <div id="wrapper mb- p-4">
                <div class="d-flex flex-column" id="content-wrapper">
                    <div id="content">
                        <div class="container-fluid">
                            <div class="card shadow">
                                <div class="card-header py-3">
                                    <p class=" m-0 fw-bold" style=" color: rgb(1, 70, 102);">Perguntas Cadastradas pelo Gestor</p>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-nowrap">
                                        <a href="CRUD_perguntas/insert_perguntas.php"><button type="button" class="btn btn-success">Adicionar Pergunta  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16">
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
                                                    <th scope="col">Categoria</th>
                                                    <th scope="col">Tipo</th>
                                                    <th scope="col">Comando</th>
                                                    <th scope="col">Gabarito</th>
                                                    <th scope="col">Data</th>
                                                    <th scope="col">Status</th>
                                                    <th scope="col">Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                        <?php
                                        include '../../ConexaoPHP/conexao.php';



                                        $procedure = "SELECT q.*, c.Categoria_Nome, t.Tipo_Nome 
                                                    FROM tb_questoes q
                                                    INNER JOIN tb_categoria c ON q.TB_Categoria_idTB_Categoria = c.idTB_Categoria
                                                    INNER JOIN tb_tipo_questao t ON q.TB_Tipo_Questao_idTB_Tipo_Questao = t.idTB_Tipo_Questao
                                                    WHERE q.TB_Gestor_idTB_Gestor = '$idTB_Gestor';";
                                                    
                                        $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

                                        while ($dados = mysqli_fetch_assoc($sql)) {
                                            $idTB_Questoes = $dados['idTB_Questoes'];
                                            $Questao_Correta = $dados['Questao_Correta'];
                                            $TB_Tipo_Questao_idTB_Tipo_Questao = $dados['TB_Tipo_Questao_idTB_Tipo_Questao'];
                                            $TB_Categoria_idTB_Categoria = $dados['TB_Categoria_idTB_Categoria'];
                                            $comando = $dados['Questoes_Pergunta'];
                                            $data = $dados['Questao_Data'];
                                            $status = $dados['Questao_Status'];
                                            $Categoria_Nome = $dados['Categoria_Nome'];
                                            $Tipo_Nome = $dados['Tipo_Nome'];
                                            
                                            $comando =  substr($comando, 0, 35);

                                            if($status == '1'){

                                                $situacao = "Ativa";
                                                $btnstatus = "Desativar";

                                            }else{

                                                $situacao = "Desativada";
                                                $btnstatus = "Ativar";
                                            }

                                        ?>


      
                                                

                                    
                                                <tr>
                                                    <td><?php echo $idTB_Questoes ?></td>
                                                    <td><?php echo $Categoria_Nome ?></td>
                                                    <td><?php echo $Tipo_Nome ?></td>
                                                    <td><?php echo $comando ?></td>
                                                    <td><?php echo $Questao_Correta ?></td>
                                                    <td><?php echo $data ?></td>
                                                    <td><span class="badge badge-success rounded-pill d-inline"><?php echo   $situacao  ?></span></td>
                                                    <td>
                                                      <a class="btn btn-danger delete-button" data-bs-toggle="modal" data-bs-target="#DeleteModal<?php echo $idTB_Questoes?>" data-id="<?php echo $idTB_Colaborador?>"><?php echo  $btnstatus ?></a>
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="DeleteModal<?php echo $idTB_Questoes?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog" >
                                                                    <div class="modal-content" >
                                                                        <div class="modal-header" style = "background-color: rgb(0, 87, 127); color: white;">
                                                                            <h1 class="modal-title fs-5" id="exampleModalLabel" >Atenção</h1>
                                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            Deseja mesmo mudar status do colaborador <?php echo $idTB_Questoes?>?
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-danger">Cancelar</button>
                                                                            <a class="btn btn-primary" href="CRUD_perguntas/Desligar_perguntas.php?idTB_Questoes=<?php echo $idTB_Questoes ?>"  value="<?php echo $idTB_Questoes?>">Mudar Status</a>
                                                                        </div>
                                                                       
                                                                    </div>
                                                                </div>
                                                            </div>
                                                          
                                                            <a class="btn btn-warning" href="CRUD_perguntas/teladeupdateperguntas.php?idTB_Questoes=<?php echo $idTB_Questoes?>">Editar</a>
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
<script src="../PROFILE/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>