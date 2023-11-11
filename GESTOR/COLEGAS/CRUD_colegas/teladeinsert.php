

<?php

include('../../../LOGOFF/arearestrita.php');



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Novo Colaborador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../../../LOGIN/assets/img/AUTORATING.png">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
    <!--Carrega as bibliotecas JavaSript para as máscaras de CPF, Celular, etc. -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">


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
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Autorating</span> </a>
                    <div class="img m-3">
                        <img class="img-fluid rounded-circle" alt="avatar1" src="../img/profile.jpg" id="fotomenu" />
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
    


       
                    <br>

                    <?php 
                    
                    if(isset($_SESSION['status_cpfjacadastrado'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert" >
                            <strong>CPF JÁ CADASTRADO!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        echo $_SESSION['status_cpfjacadastrado'];
                        unset($_SESSION['status_cpfjacadastrado']);
                    }
                    ?>
                    <?php 
                    
                    if(isset($_SESSION['status_Problemascomaimagem'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>PROBLEMAS COM A IMAGEM!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        echo $_SESSION['status_Problemascomaimagem'];
                        unset($_SESSION['status_Problemascomaimagem']);
                    }
                    ?>
                    
                    <?php 
                    
                    if(isset($_SESSION['problemagenerico'])){ ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Algo deu errado!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php
                        echo $_SESSION['problemagenerico'];
                        unset($_SESSION['problemagenerico']);
                    }
                    ?>



                  <!------status_cpfjacadastrado ---->
                </div>
                <form action="insert_colaborador.php" method="post" enctype="multipart/form-data" id="insertcolaborador">
                    <div class="row profile-row">
                        <div class="col-md-4 relative">
                            <div class="avatar">
                                <div class="center" >
                                <img class="alt rounded-circle mb-3 mt-4 img-fluid w-50 rounded-preview" src="../assets/img/avatar.png" name="imagemPreview" id="imagemPreview">

                                </div>
                            </div><input class="form-control form-control" type="file" name="imagem" id="imagem"  accept=".png, .jpg, .jpeg" onchange="previewImage()">
                        </div>
                        <div class="col-md-8">
                            <h1 style="font-size: 23px;">Novo colaborador </h1>
                            <hr>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">CPF</label> <span class="span-required" id="mescpf"></span><input class="form-control" type="text" name="cpf" id="cpf" maxlength="14" oninput="formatarCPFInput(this)" onkeydown="verificacpf()"></div>
                                  
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Nome</label> <span class="span-required" id="mesnome"></span> <input class="form-control" type="text" name="nome" id="nome"  onkeydown="verificanome()" maxlength="30"></div>
                                </div>
                            </div>
                            <div class="form-group mb-3"><label class="form-label">Email</label> <span class="span-required" id="mesemail"></span><input class="form-control" type="email" autocomplete="off" required="" name="email" id="email" onkeydown="verificaemail()" <?php if(isset($_POST['email'])) echo 'value="' . htmlspecialchars($_POST['email']) . '"'; ?>  maxlength="35"> </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Data de Nascimento</label><input class="form-control" type="date" name="nascimento" id="nascimento" autocomplete="off" required=""></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Telefone</label><input class="form-control" type="text" autocomplete="off" name="telefone" id="telefone" required=""  maxlength="15"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Função</label><input class="form-control" type="text" autocomplete="off" name="funcao" id="funcao" required=""  maxlength="20"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Data de Admissão</label><input class="form-control" type="date" autocomplete="off" required="" name="admissao" id="admissao"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Senha</label><input class="form-control" type="password" autocomplete="off" name="senha" id="senha" required=""  maxlength="25"></div>
                                </div>
                                <div class="col-sm-12 col-md-6">
                                    <div class="form-group mb-3"><label class="form-label">Confirmar Senha</label><input class="form-control" type="password" autocomplete="off" required="" name="confirmarsenha" id="confirmarsenha"  maxlength="25"></div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 content-right"><input class="btn form-btn" type="submit" style="background-color: rgb(0, 87, 127); color: white" onclick="teste(event)"><a class="btn btn-danger form-btn" href="../colegas.php" style="background: rgb(230,28,47);" value ="Voltar">Voltar</a></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </main>
    </main>


</body>

<script>
function teste(event) {
    const cpf = $('#cpf').val();
    const nome = $('#nome').val();
    const email = $('#email').val();
    const telefone = $('#telefone').val();
    const nascimento = $('#nascimento').val();
    const admissao = $('#admissao').val();
    const funcao = $('#funcao').val();
    const senha = $('#senha').val();
    const confirmarsenha = $('#confirmarsenha').val();
    const imagem = $('#imagem').val();


    if (cpf !== "" && nome !== "" && email !== "" && telefone !== "" && nascimento !== "" && admissao !== "" &&
    funcao !== "" && senha !== "" && confirmarsenha !== "") {
    
    if (validarCPF(cpf)) {
        
            if (senha === confirmarsenha) { 
                $('#insertcolaborador').unbind('submit').submit();
        } else {
            alert('As senhas não coincidem');

            event.preventDefault();
            return false;
        }
    } else {
        alert("CPF inválido");
        event.preventDefault();
        return false;
    }
} else {
    alert("Preencha todos os campos");
    event.preventDefault();
    return false;
}
}


function validarCPF(cpf) {
    cpf = cpf.replace(/\D/g, ''); // Remove caracteres não numéricos

    if (cpf.length !== 11 || !/^\d{11}$/.test(cpf)) {
        return false; // O CPF deve ter 11 dígitos numéricos
    }

    // Verifica se todos os dígitos são iguais
    if (/^(\d)\1+$/.test(cpf)) {
        return false; 
    }

 
    var soma = 0;
    for (var i = 0; i < 9; i++) {
        soma += parseInt(cpf.charAt(i)) * (10 - i);
    }
    var resto = 11 - (soma % 11);
    var digito1 = (resto === 10 || resto === 11) ? 0 : resto;

    soma = 0;
    for (var i = 0; i < 10; i++) {
        soma += parseInt(cpf.charAt(i)) * (11 - i);
    }
    resto = 11 - (soma % 11);
    var digito2 = (resto === 10 || resto === 11) ? 0 : resto;

    // Verifica se os dígitos verificadores estão corretos
    if (parseInt(cpf.charAt(9)) !== digito1 || parseInt(cpf.charAt(10)) !== digito2) {
        return false; // CPF inválido
    }

    return true; // CPF válido
}


// Verificador de Imagem

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
<script>
  AOS.init();
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="../assets/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/js/script.min.js"></script>
<script src="../assets/js/chart.min.min.js"></script>
<script src="../assets/js/main.js"></script>
<script src="../assets/js/valida.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>

</html>
