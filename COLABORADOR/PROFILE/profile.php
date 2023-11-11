<?php
include '../../ConexaoPHP/conexao.php';
include('../../LOGOFF/verifica_credencial.php');
$cpf = $_SESSION['cpf'];

// Consulta para obter dados do colaborador
$procedure = "SELECT * FROM tb_colaborador WHERE Colaborador_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $idTB_Colaborador = $dados['idTB_Colaborador'];
    $nome = $dados['Colaborador_Nome'];
    $email = $dados['Colaborador_Email'];
    $telefone = $dados['Colaborador_Telefone'];
    $status = $dados['Colaborador_Status'];
    $nascimento = $dados['Colaborador_Nascimento'];
    $senha = $dados['Colaborador_Senha'];
    $admissao = $dados['Colaborador_Adimissao'];
    $funcao = $dados['Colaborador_Funcao'];
    $TB_Gestor_idTB_Gestor = $dados['TB_Gestor_idTB_Gestor'];
    $foto = $dados['Colaborador_Foto'];
    

    
    $quantidade_de_caracteres = 18; 
    $tratacaminhoimagem = substr($foto, - $quantidade_de_caracteres);
    
}

// Consulta para obter o nome do gestor
$gestor = "SELECT * FROM TB_Gestor WHERE idTB_Gestor = '$TB_Gestor_idTB_Gestor'";
$sql = mysqli_query($conn, $gestor) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {
    $nome_gest = $dados['Gestor_Nome'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meu Perfil</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/profile.css">
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
                        <a href="../Dashboard/dashboard.php" class="nav_link "> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                        <a href="../profile/profile.php" class="nav_link active"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div> 
            </nav>
        </div>
        <br>
        <br>
        <br>
        <blockquote class="blockquote text-center">
            <h3 class="mb-1 p-4" >Meus dados pessoais</h3>
        </blockquote>
        <hr>
        <?php 
            if (isset($_SESSION['status_update'])) { 
        ?>
        <div class="alert alert-success alert-dismissible fade show col-3" role="alert">
            <strong>Dados atualizados com sucesso! </strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
                echo $_SESSION['status_update']; 
                unset($_SESSION['status_update']); 
            } 
        ?>
         
         <?php 
            if (isset($_SESSION['error_update_profile_colaborador'])) { 
        ?>
        <div class="alert alert-danger alert-dismissible fade show col-3" role="alert">
             <strong>Senhas divergente!</strong> 
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php 
                echo $_SESSION['error_update_profile_colaborador']; 
                unset($_SESSION['error_update_profile_colaborador']); 
            } 
        ?>
        <?php
                if (isset($_SESSION['error_update_profile_colaborador_vazio'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show col-3" role="alert">
                            <strong>Preencha todos os campos!</strong> 
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['error_update_profile_colaborador_vazio'];
                        unset($_SESSION['error_update_profile_colaborador_vazio']);
                    }
                ?>

            

        <div id="wrapper">
            <div class="d-flex flex-column" id="content-wrapper">
                <div id="content">
                    <div class="container-fluid">

                        <div class="row mb-3">
                            <div class="col-lg-4">
                                <div class="card mb-3"> <!--------------------------------------------->
                                    <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="../UPLOADS_IMAGENS/<?php echo $tratacaminhoimagem?>" width="160" height="160">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-8">
                                <div class="row mb-3 d-none">
                                    <div class="col">
                                        <div class="card text-white bg-primary shadow">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">Peformance</p>
                                                        <p class="m-0"><strong>65.2%</strong></p>
                                                    </div>
                                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                </div>
                                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="card text-white bg-success shadow">
                                            <div class="card-body">
                                                <div class="row mb-2">
                                                    <div class="col">
                                                        <p class="m-0">Peformance</p>
                                                        <p class="m-0"><strong>65.2%</strong></p>
                                                    </div>
                                                    <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                                </div>
                                                <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow mb-3">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Dados principais</p>
                                            </div>
                                            <div class="card-body">
                                                <form action="update_profile_colaborador.php" method="post" >
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="username"><strong>CPF</strong></label><input class="form-control" type="text" id="username" placeholder="user.name" name="username" value="<?php echo $cpf ?>" disabled=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="email"><strong>Nome</strong></label><input class="form-control" type="text" id="email" placeholder="user@example.com" name="email" value="<?php echo $nome ?>" disabled=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>Email</strong></label><input class="form-control" type="email" id="email" placeholder="John" name="email" value="<?php echo $email ?>" maxlength="35"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>Data de nascimento</strong></label><input class="form-control" type="date" id="first_name" placeholder="John" name="first_name" value="<?php echo $nascimento ?>" disabled=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="last_name"><strong>Telefone</strong></label><input class="form-control" type="text" id="telefone" placeholder="Telefone" name="telefone"  value="<?php echo $telefone ?>" maxlength="15"></div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="first_name"><strong>Senha</strong></label><input class="form-control" type="password" id="senha" placeholder="senha" name="senha" value="<?php echo $senha ?>" maxlength="25"></div>
                                                        </div>
                                                        <div class="col">
                                                        <div class="mb-3"><label class="form-label" for="first_name"><strong>Confrima Senha</strong></label><input class="form-control" type="password" id="confirmasenha" placeholder="confirmasenha" name="confirmasenha" value="<?php echo $senha ?>" maxlength="25"></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"><input class="btn btn-primary btn-sm" id="botao_atualiza_profile" type="submit" value="Atualizar informações"></div>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="card shadow">
                                            <div class="card-header py-3">
                                                <p class="text-primary m-0 fw-bold">Outras informações</p>
                                            </div>
                                            <div class="card-body">
                                                <form>
                                                    <div class="mb-3"><label class="form-label" for="address"><strong>Função</strong></label><input class="form-control" value="<?php echo $funcao ?>" disabled="" ></div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="city"><strong>Nome do Gestor</strong></label><input class="form-control" type="text" id="city" placeholder="Los Angeles" name="city" value="<?php echo $nome_gest ?>" disabled=""></div>
                                                        </div>
                                                        <div class="col">
                                                            <div class="mb-3"><label class="form-label" for="country"><strong>Data de admissão</strong></label><input class="form-control" type="date" id="country" placeholder="USA" name="country" value="<?php echo $admissao ?>" disabled=""></div>
                                                        </div>
                                                    </div>
                                                    <div class="mb-3"></div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- ... (scripts JavaScript) ... -->
</body>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#telefone').inputmask("(55) 9 9999-9999");
    });
</script>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>
