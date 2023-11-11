<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Área administrativa</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="shortcut icon" type="image/png" href="../LOGIN/assets/img/AUTORATING.png">
</head>

<body style=" background-color: rgb(0, 87, 127);">
    <section class="position-relative py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 style="color:white">Área administrativa&nbsp;</h2>
                    <p class="w-lg-50"></p>
                </div>
            </div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-6 col-xl-4">
                    <div class="card mb-5">
                        <div class="card-body d-flex flex-column align-items-center">
                            <div class="bs-icon-xl bs-icon-circle bs-icon-primary bs-icon my-4"><img src="assets/img/AUTORATING.png" width="153" height="157"></div>
                            <form class="text-center" method="post" action="logaradm.php">
                                <div class="mb-3"><input class="form-control" type="email" name="adm_email" placeholder="Usuario"></div>
                                <div class="mb-3"><input class="form-control" type="password" name="adm_senha" placeholder="Senha"></div>
                                <div class="mb-3"><button class="btn btn-primary d-block w-100" type="submit" style="background: var(--bs-btn-active-border-color);">Login</button></div>
                                <p class="text-muted">TECNOTRIBE 2023</p>
                                <a href="../index.php">    <p class="text-muted">Voltar a Landing Page</p></a>
                            </form>
                            <?php
                session_start();
                if (isset($_SESSION['erroradm'])) {
                ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>Erro ao fazer o login!</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo $_SESSION['erroradm'];
                    unset($_SESSION['erroradm']);
                }
                    ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>