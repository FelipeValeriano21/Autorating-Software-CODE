<?php

include('../../../LOGOFF/arearestrita.php');
include('../../../ConexaoPHP/conexao.php');

if (isset($_GET['idTB_Colaborador'])) {
    $idTB_Colaborador = $_GET['idTB_Colaborador'];

    $procedure = "select * from TB_Colaborador where idTB_Colaborador = '$idTB_Colaborador';";
  
    $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

    while ($dados = mysqli_fetch_assoc($sql)) {
        $idTB_Colaborador = $dados['idTB_Colaborador'];
        $nome = $dados['Colaborador_Nome']; 
        $email = $dados['Colaborador_Email'];
        $funcao = $dados['Colaborador_Funcao'];
        $senha = $dados['Colaborador_Senha'];
        $telefone = $dados['Colaborador_Telefone'];
        $adimissao = $dados['Colaborador_Adimissao'];
        $status = $dados['Colaborador_Status'];
        $nascimento = $dados['Colaborador_Nascimento'];
        $cpfcolab = $dados['Colaborador_CPF'];
        $foto = $dados['Colaborador_Foto'];

        if($foto == ""){

            $foto = "../assets/img/avatar.png" ;

          }
    }

    // Faça o que você precisa com o valor de $id aqui
} else {
    echo("Nao ta chegando");
}
?>

<?php


$cpf = $_SESSION['cpf'];

$procedure = "select Gestor_Foto from TB_Gestor where Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $fotogest = $dados['Gestor_Foto'];
  
    $quantidade_de_caracteres = 18; 
    $tratacaminhoimagem = substr($fotogest, - $quantidade_de_caracteres);
    
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
    <title>Editar Colaborador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
     <link rel="shortcut icon" type="imagex/png" href="../../../Login/assets/img/AUTORATING.png">
     <link rel="stylesheet" href="assets/css/styles.min.css">
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
            <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
               <div  class="img m-3"> 
               <img class="rounded-circle mb-3 mt-4" src="../../UPLOADS_IMAGENS/<?php echo $tratacaminhoimagem ?>" width="160" height="160" id="fotomenu">
               
              </div>
               <hr>
               <div class="nav_list mt-4">
                        <a href="../../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a>
                        <a href="../../COLEGAS/colegas.php" class="nav_link active"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a>
                        <a href="../../PESQUISAS/Base/Pesquisas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a>
                        <a href="../../DASHBOARD/Dashboard.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="../../PROFILE/profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
            </div> 
        </nav>
    </div>
    <main>

            <div class="container profile profile-view" id="profile">
                <div class="row">
                    <div class="col-md-12 alert-col relative">
                        <div class="alert alert-info absolue center" role="alert"><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="alert"></button><span>Profile save with success</span></div>
                    </div>
                </div>
        
                <form action="update_colaborador.php" method="post" enctype="multipart/form-data">
                    
                    <div class="row profile-row">
                        
                        <div class="col-md-4 relative">
                        <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">ID COLABORADOR</label><input class="form-control" type="text" name="idTB_Colaborador" id="idTB_Colaborador"  value="<?php echo $idTB_Colaborador?>" readonly></div>
                                </div>
                            <div class="avatar">
                           <img class="rounded-circle mb-3 mt-4" src="<?php echo $foto ?>" width="160" height="160" id="imagemPreview">
                            </div><input class="form-control form-control" type="file" name="imagem" id="imagem"  accept=".png, .jpg, .jpeg" onchange="previewImage()" >
                        </div>
                        
                        <div class="col-md-8">
                            <h1 style="font-size: 23px;">Editar colaborador</h1>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">CPF</label><input class="form-control" type="text" name="cpf" id="cpf" disabled= "" value="<?php echo$cpfcolab?>"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Nome</label><input class="form-control" type="text" name="nome" id="nome" value="<?php echo$nome?>" maxlength="30"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3"><label class="form-label">Email</label><input class="form-control" type="email" autocomplete="off" required=""name="email" id="email" value="<?php echo$email?>" maxlength="35"></div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Data de Nascimento</label><input class="form-control" type="date" name="nascimento" id="nascimento"autocomplete="off" required="" value="<?php echo$nascimento?>"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Telefone</label><input class="form-control" type="text" autocomplete="off" name="telefone" id="telefone" required="" value="<?php echo$telefone?>" maxlength="15"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Função</label><input class="form-control" type="text" autocomplete="off" name="funcao" id="funcao"  required="" value="<?php echo$funcao?>" maxlength="20"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Data de Admissão</label><input class="form-control" type="date"  autocomplete="off" required=""  name="admissao" id="admissao" value="<?php echo$adimissao?>" disabled ="" ></div>
                                </div>
                            </div>
                            <div class="form-group mb-3"><label class="form-label">Senha</label><input class="form-control" type="password" autocomplete="off" required=""name="senha" id="senha" value="<?php echo$senha?>" disabled = "" maxlength="25"></div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 content-right">
                               <input type = "submit" class="btn btn-warning" value="Atualizar" onclick="teste(event)">
                                
                               <a class="btn btn-danger form-btn" href="../colegas.php" style="background: rgb(230,28,47);" value ="Voltar">Voltar</a>
                            </div>
                        </div>
                    </div>
                </form>
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
<script>

function teste(event) {
    const nome = $('#nome').val();
    const email = $('#email').val();
    const telefone = $('#telefone').val();
    const nascimento = $('#nascimento').val();
    const funcao = $('#funcao').val();


    if (nome !== "" && email !== "" && telefone !== "" && nascimento !== "" &&
    funcao !== "") {
    
    
} else {
    alert("Preencha todos os campos");
    event.preventDefault();
    return false;
}
}

function previewImage() {
    const input = document.getElementById('imagem');
    const preview = document.getElementById('imagemPreview');
    const imagemPadrao = document.getElementById('imagemPadrao');

    if (input.files && input.files[0]) {
        const file = input.files[0];

        if (file.type === 'image/png' || file.type === 'image/jpeg' || file.type === 'image/jpg') {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                imagemPadrao.style.display = 'none'; // Oculta a imagem padrão
            };

            reader.readAsDataURL(file);
        } else {
            alert('Por favor, selecione um arquivo PNG ou JPG.');
            input.value = ''; // Limpa a seleção de arquivo inválido.
            preview.src = ''; // Limpa o preview da imagem.
            imagemPadrao.style.display = 'block'; // Exibe a imagem padrão
        }
    } else {
        preview.src = ''; // Limpa o preview da imagem se nenhum arquivo foi selecionado.
        imagemPadrao.style.display = 'block'; // Exibe a imagem padrão
    }
}

</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/script.min.js"></script>
<script src="../assets/js/chart.min.min.js"></script>       
<script src="../assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>
