<!DOCTYPE html>
<html data-bs-theme="light" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TECHNOTRIBE MLV</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" type="imagex/png" href="LANDING PAGE/assets/img/login.png">
</head>

<style>
    .nav-item {
    margin: 10px 0;
}

</style>

<body>
    <nav class="navbar navbar-expand-md fixed-top navbar-shrink py-3" id="mainNav" style="background-color:#16417C; color: white;">
        <div class="container"><a class="navbar-brand d-flex align-items-center" href="index.php"><img class="rounded img-fluid fit-cover" style="min-height: 5px;" src="LANDING PAGE/assets/img/login.png" width="50"> <span style="color: white;">TECHNOTRIBE MLV</span></a><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"><span class="visually-hidden">Toggle navigation</span><span class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse" id="navcol-1">
            <ul class="navbar-nav mx-auto">
    <li class="nav-item"><a class="nav-link active" href="index.php" style="color: white;">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#quem-somos" style="color: white;">Quem Somos?</a></li>
    <li class="nav-item"><a class="nav-link" href="#autorating" style="color: white;">Autorating</a></li>
    <li class="nav-item"><a class="nav-link" href="#preço" style="color: white;">Preços</a></li>
    <li class="nav-item"><a class="nav-link" href="#contactar" style="color: white;">Contatos</a></li>
</ul>

                
                <a class="btn btn-primary shadow" role="button" href="LOGIN/teladelogin.php" >Login<svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-login" style="font-weight: bold;margin: 4px;font-size: 17px;width: 19px;">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M14 8v-2a2 2 0 0 0 -2 -2h-7a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h7a2 2 0 0 0 2 -2v-2"></path>
                        <path d="M20 12h-13l3 -3m0 6l-3 -3"></path>
                    </svg>&nbsp;</a>
            </div>
        </div>
    </nav>

    <br>

    <header class="pt-5">
        <div class="container pt-4 pt-xl-5">
            <div class="row pt-5" style="padding: 29px 0px 0px;">
                <div class="col-md-8 text-center text-md-start mx-auto">
                
                <?php
                session_start();
                
                if (isset($_SESSION['mensagemenviadacomsucesso'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Mensagem enviada com sucesso!</strong> A TECHNOTRIBE irá entrar em contato o mais rapido possivel
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                         echo $_SESSION['mensagemenviadacomsucesso'];
                         unset($_SESSION['mensagemenviadacomsucesso']);
                    
                    }

                    if (isset($_SESSION['mensagemerro'])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Mensagem enviada com sucesso!</strong> A TECHNOTRIBE irá entrar em contato o mais rapido possivel
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                        
                        }
                ?>

<br>           
                    <div class="text-center" data-aos="zoom-in">
                        <h1 class="display-4 fw-bold mb-5" style="font-size: 52px;text-align: center;border-color: #16417C;" >Sua Solução Tecnológica Empresarial MLV</h1>
                        <p class="fs-5 text-muted mb-5">Conectando Inovação à Gestão para você</p>
                        <form class="d-flex justify-content-center flex-wrap" method="post" data-bs-theme="light">
                            <div class="shadow-lg mb-3"><button class="btn btn-primary" style="background: #16417C;" type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Contactar agora</button></div>
                        </form>
                    </div>
                </div>
                
                <br>

                
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="text-center position-relative"><img class="img-fluid" src="LANDING PAGE/assets/img/background/1.jpg" data-aos="zoom-in" style="width: 1800px;"></div>
                </div>
            </div>
        </div>
    </header>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" style="background-color:#16417C; color: white;">
                        <h5 class="modal-title" id="exampleModalLabel">Formulário TECHNOTRIBE</h5>
                        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    
                    <div class="modal-body">
                    <form action="LANDING PAGE/contatodaempresa.php" method="post">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="nomedono" class="form-control" name="nomedono" maxlength="25">
                                        <label class="form-label" for="form3Example1">Seu Nome</label>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-outline">
                                        <input type="text" id="nomeempresa" class="form-control"  name="nomeempresa" maxlength="25">
                                        <label class="form-label" for="form3Example2">Empresa</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="email" id="emailempresa" class="form-control" name="emailempresa" maxlength="35"  placeholder="Seu email">
                                <label class="form-label" for="form3Example3">Email</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="text" id="telefoneempresa" class="form-control"  name="telefoneempresa" maxlength="15" placeholder="(55) 9 9999-9999">
                                <label class="form-label" for="form3Example4">Telefone</label>
                            </div>            
                        </div>

                        <div class="modal-footer" >
                            <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Voltar</button>
                            <input type="submit"  onclick = "validarFormulario()" style="background-color: #16417C; color: white;" > 
                        </div>
                </form>
            </div>
        </div>
    </div>

    <section>
        <div class="container py-4 py-xl-5">
        <section>
    <div class="container py-4 py-xl-5">
    <div-center class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h3 id="autorating" class="display-6 fw-bold pb-md-4">Quem nós somos?</h3>
                </div>
            </div-center>
            <br>
        <div class="row gy-4 gy-md-0">
            <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                <div><img class="rounded img-fluid fit-cover" style="min-height: 300px; border-radius:5px" src="landing page/assets/img/background/interview.jpg" width="800" /></div>
            </div>
            <div class="col">
                <div style="max-width: 450px;">
               
                <p class="text-muted py-4 py-md-0 text-justify m-2 ">Somos uma startup inovadora, impulsionando seu sucesso através de análises de desempenho de colaboradores em suas respectivas áreas por meio de questionários.</p>

                <br>

                    <div class="row gy-4 row-cols-2 row-cols-md-2">
                        <div class="col">
                            <div><span class="fs-2 fw-bold text-primary">30+</span>
                            <p class="fw-semi-bold text-muted">Empresas parceiras</p>

                            </div>
                        </div>
                        <div class="col">
                            <div><span class="fs-2 fw-bold text-primary ">1000+</span>
                                <p class="fw-normal text-muted">Colaboradores Ativos</p>
                            </div>
                        </div>
                        <div class="col">
                            <div><span class="fs-2 fw-bold text-primary">5000+</span>
                                <p class="fw-normal text-muted">Avaliações feitas</p>
                            </div>
                        </div>
                        <div class="col">
                            <div><span class="fs-2 fw-bold text-primary">90%</span>
                                <p class="fw-normal text-muted">Aprovações</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
    </section>

    <section>
        <div class="container py-4 py-xl-5">
            <div-center class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h3 id="autorating" class="display-6 fw-bold pb-md-4">Autorating Software</h3>
                    <p class="text-muted">O melhor sofware de avaliação de funcionarios</p>
                </div>
            </div-center>
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div>
                        <div class="row gy-2 row-cols-1 row-cols-sm-2">
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-message-report fs-3 text-primary bg-secondary">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 21v-13a3 3 0 0 1 3 -3h10a3 3 0 0 1 3 3v6a3 3 0 0 1 -3 3h-9l-4 4"></path>
                                        <line x1="12" y1="8" x2="12" y2="11"></line>
                                        <line x1="12" y1="14" x2="12" y2="14.01"></line>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2" style="font-size: 18px;">Emissão de Relatório</h5>
                                </div>
                                <p class="text-muted my-3">Emissão personalizada de relatorios</p>
                            </div>
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-question-mark fs-3 text-primary bg-secondary">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M8 8a3.5 3 0 0 1 3.5 -3h1a3.5 3 0 0 1 3.5 3a3 3 0 0 1 -2 3a3 4 0 0 0 -2 4"></path>
                                        <line x1="12" y1="19" x2="12" y2="19.01"></line>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2" style="font-size: 17px;">Cadastro das suas Questões</h5>
                                </div>
                                <p class="text-muted my-3">Escolha as questões que serão submetidas</p>
                            </div>
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-users fs-3 text-primary bg-secondary">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="9" cy="7" r="4"></circle>
                                        <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path>
                                        <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                        <path d="M21 21v-2a4 4 0 0 0 -3 -3.85"></path>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2" style="font-size: 18px;">Criação de Avaliações por categoria</h5>
                                </div>
                                <p class="text-muted my-3">O proprio sistema cria e seleciona as avaliações por categoria</p>
                            </div>
                            <div class="col text-center text-md-start">
                                <div class="d-flex justify-content-center align-items-center justify-content-md-start"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-dashboard fs-3 text-primary bg-secondary">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <circle cx="12" cy="13" r="2"></circle>
                                        <line x1="13.45" y1="11.55" x2="15.5" y2="9.5"></line>
                                        <path d="M6.4 20a9 9 0 1 1 11.2 0Z"></path>
                                    </svg>
                                    <h5 class="fw-bold mb-0 ms-2" style="font-size: 18px;">Dashboard invídual</h5>
                                </div>
                                <p class="text-muted my-3">Tenha uma visão macro da empresa de forma facilitada</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 order-first order-md-last">
                    <div><img class="rounded img-fluid w-75 fit-cover" data-aos="fade-left" style="min-height: 100px;" src="LANDING PAGE/assets/img/clipboard-image-1.png"></div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-5">
        <div class="container py-4 py-xl-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <h2 id="preço" class="display-6 fw-bold mb-4">Planos e Preços</h2>
                    <p class="text-muted">"Qualidade que cabe no seu bolso"</p>
                </div>
            </div>
            <div class="row gy-4 row-cols-1 row-cols-md-2 row-cols-lg-3">
            
            <div class="col-md-8 col-xl-6 text-center mx-auto">
            <div>
                <img class="rounded img-fluid fit-cover" style="min-height: 500px;" src="LANDING PAGE/assets/img/background/istockphoto-1465188429-170667a.webp" width="2000" data-aos="fade-up-right">           
            </div>
        </div>

                <div class="col">
                    <div class="card border-0 h-100">
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div>
                                <h6 class="fw-bold text-muted">Versão Premium</h6>
                                <h4 class="display-5 fw-bold mb-4">R$ 600/mês</h4>
                                <ul class="list-unstyled">
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary-emphasis">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Relátorios de dados.</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary-emphasis">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Dashboard's completos.</span></li>
                                    <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary-emphasis">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Diagnóstico com Analises e informações.</span></li>
                                            <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary-emphasis">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M5 12l5 5l10 -10"></path>
                                            </svg></span><span>Suporte a futuras funcionalidades.</span></li>
                                </ul>
                            </div>
                            <hr>
                            <div>
                                <h6 class="fw-bold text-muted">Versão Business</h6>
                                    <h4 class="display-5 fw-bold mb-4">R$ 250/mês</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary-emphasis">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg></span><span>Relátorios completos.</span></li>
                                        <li class="d-flex mb-2"><span class="bs-icon-xs bs-icon-rounded bs-icon me-2"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icon-tabler-check fs-5 text-primary-emphasis">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M5 12l5 5l10 -10"></path>
                                                </svg></span><span>Dashboard's completos.</span></li>
                                      
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <section class="py-4 py-xl-5" >
        <div class="container">
            <div class="text-white  border rounded border-0 border-primary d-flex flex-column justify-content-between flex-lg-row p-4 p-md-5" style="background-color:#16417C; color: white;">
                <div class="pb-2 pb-lg-1">
                    <h3 id="contactar" class="fw-bold  mb-2" style="background-color:#16417C; color: white;">Fale com a gente agora mesmo</h3>
                    <p class="mb-0">O melhor preço para você</p>
                </div>
                <div class="my-2"><button class="btn btn-light fs-5 py-2 px-4" type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#exampleModal">Contactar</button></div>
            </div>
        </div>
    </section>
    <footer style="background-color:#16417C; color: white;">
        <div class="container py-4 py-lg-5" style="text-align: center;">
            <div class="row row-cols-2 row-cols-md-4" style="text-align: center;">
                <div class="col-sm-4 col-md-3 text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Serviços</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color:white">Avaliação de Colaborador</a></li>
                        <li></li>
                        <li></li>
                    </ul>
                </div>
                <div class="col-sm-4 col-md-3 text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Time</h3>
                    <ul class="list-unstyled">
                        <li><a href="#" style="color:white">Felipe Valeriano dos Reis</a></li>
                        <li><a href="#" style="color:white">Matheus Lopes&nbsp;</a></li>
                        <li><a href="#" style="color:white">Matheus Martins&nbsp;</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0" style="color:white">TECHNOTRIBEMLV © 2023</p>
                <ul class="list-inline mb-0">
              
                       <a href="ADM/index.php"><button class="btn btn-warning">Área Administrativo <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-diamond-fill" viewBox="0 0 16 16">
  <path d="M9.05.435c-.58-.58-1.52-.58-2.1 0L.436 6.95c-.58.58-.58 1.519 0 2.098l6.516 6.516c.58.58 1.519.58 2.098 0l6.516-6.516c.58-.58.58-1.519 0-2.098L9.05.435zM8 4c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995A.905.905 0 0 1 8 4zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></button></a> 
                </ul>
            </div>
        </div>
        
    </footer>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js"></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $('#telefoneempresa').mask('(55)############');
      });
</script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
  AOS.init();
</script>
   
    <script type="text/javascript"src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <!-- MDB -->
    <script>
        function validarFormulario() {
            var nomedono = document.getElementById('nomedono').value;
            var nomeempresa = document.getElementById('nomeempresa').value;
            var emailempresa = document.getElementById('emailempresa').value;
            var telefoneempresa = document.getElementById('telefoneempresa').value;
            
            if (nomedono !== "" && nomeempresa !== "" && emailempresa !== "" && telefoneempresa !== "") {
                $('#insertPeguntas').unbind('submit').submit();
            }else{
                alert("Preencha todos os campos por favor");
                event.preventDefault();
           
            }
            
            return true;
        }
    </script>


</body>

</html>