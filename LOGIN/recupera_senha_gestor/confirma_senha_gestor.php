<?php 

session_start();

include('../../CONEXAOPHP/conexao.php');
$confirmacpf = $_SESSION['confirmacpf'];


?>


<!DOCTYPE html>
<html data-bs-theme="light" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Recuperar Senha</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="../assets/dist/css/style.css">
    <link rel="shortcut icon" type="imagex/png" href="../assets/img/AUTORATING.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
</head>
<body class="" style="background-color:  rgb(0, 87, 127);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;../assets/img/AUTORATING.png&quot;);"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="font-family: times new roman;">Redefinir Senha</h4>
                                    </div>
                                    <form class="user" method="post" action="update_senha_gestor.php" id="myForm">
                                        <div class="mb-3">
                                            <input type="text" id="novasenha" aria-describedby="emailHelp" placeholder="Nova Senha" name="novasenha" class="form-control" maxlength="40">
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" type="text" id="confirmanovaSenha" placeholder="Confirmar Nova Senha" name="confirmanovasenha" maxlength="40">
                                        </div>
                                     
                                        
                                  
                                        <a><button class="btn btn-primary w-100" id="btn-confirma" type="submit" onclick="tratasenha()">Trocar a senha</button></a>
                                        <hr>
                                    </form>
                                    <div class="text-center"><a class="small" href="../teladelogin.php">Voltar ao login</a></div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                
                if (isset($_SESSION['confirmarsenhaerrogest'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erro ao redefinir senha!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo $_SESSION['confirmarsenhaerrogest'];
                    unset($_SESSION['confirmarsenhaerrogest']);
                }

                if (isset($_SESSION['campos_vazios'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Erro ao fazer o login!</strong> Complete todos os campos
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['campos_vazios'];
                        unset($_SESSION['campos_vazios']);
                    }
                ?>
            </div>
        </div>
    </div>

    <script>

       function tratasenha() {
        const form = document.getElementById('myForm');
        const novaSenhaInput = document.getElementById('novasenha');
        const confirmaNovaSenhaInput = document.getElementById('confirmanovaSenha');
        const submitButton = document.getElementById('btn-confirma');

        form.addEventListener('submit', function (event) {
            if (novaSenhaInput.value.trim() === '' || novaSenhaInput.value !== confirmaNovaSenhaInput.value) {
                alert('Por favor, preencha a nova senha corretamente.');
                event.preventDefault(); // Impede o envio do formulário se as condições não forem atendidas
            }
        });

    }
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="verificador.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>