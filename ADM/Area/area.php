<?php

include('../../LOGOFF/adm_credencial.php');


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Adminstração</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../COLABORADOR/COLEGAS/assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="image/png" href="../../LOGIN/assets/img/AUTORATING.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
        <a href="../../LOGOFF/autenticacao_adm.php" id="btn-sair" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a> 
    </header>
    <main>
        <div class="l-navbar" id="nav-bar"> 
            <nav class="nav">
                <div> <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                    <div  class="img m-3"> 
                    <img class="rounded-circle mb-3 mt-4" src="../../LOGIN/assets/img/AUTORATING.png" width="160" height="160" id="fotomenu">
                    </div>
                    <hr>
                    <div class="nav_list mt-4">
                    <a href="area.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                          <a href="gestores/gerirgestores.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Gerir Gestores</span> </a> 
                        <a href="empresa/gerirempresa.php" class="nav_link"> <i class='bx bxs-business nav_icon'></i> <span class="nav_name">Gerir Empresas</span> </a> 
                        <a href="categorias/gerircategorias.php" class="nav_link"> <i class='bx bxs-category  nav_icon'></i> <span class="nav_name">Gerir Categorias</span> </a> 
                    </div>
                </div> 
            </nav>
        </div>

        <main>
            <br>
            <br>
            <br>
            <blockquote class="blockquote text-center">
                <h3 class="mb-1 p-4" >Área Adminstrativa</h3>
            </blockquote>

            <hr>

            <div class="container">
        <div class="row">
            <div class="col-sm">
                 <div class="card text-center">
                        <div class="card-header"  style="background-color: #014666; color: white;">GERIR GESTORES
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        </div>
                    <div class="card-body">
                        
                        <a href="gestores/gerirgestores.php" class="btn btn-primary"  style="background-color: #014666; color: white;">Ingressar</a>
                        </div>
                    <div class="card-footer text-muted"  style="background-color: #014666; color: white;"></div>
                    </div>
            </div>
            <div class="col-sm">
            <div class="card text-center">
                        <div class="card-header"  style="background-color: #014666; color: white;">GERIR EMPRESAS
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-building-fill" viewBox="0 0 16 16">
  <path d="M3 0a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h3v-3.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5V16h3a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H3Zm1 2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5ZM4 5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM7.5 5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1ZM4.5 8h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Zm2.5.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1Zm3.5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5Z"/>
</svg>
                        </div>
                    <div class="card-body">
                     
                        <a href="empresa/gerirempresa.php" class="btn btn-primary"  style="background-color: #014666; color: white;">Ingressar</a>
                        </div>
                    <div class="card-footer text-muted"  style="background-color: #014666; color: white;"></div>
                    </div>
            </div>
            <div class="col-sm">
            <div class="card text-center">
                        <div class="card-header"  style="background-color: #014666; color: white;">GERIR CATEGORIAS
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark-fill" viewBox="0 0 16 16">
  <path d="M2 2v13.5a.5.5 0 0 0 .74.439L8 13.069l5.26 2.87A.5.5 0 0 0 14 15.5V2a2 2 0 0 0-2-2H4a2 2 0 0 0-2 2z"/>
</svg>
                        </div>
                    <div class="card-body">
                  
                        <a href="categorias/gerircategorias.php" class="btn btn-primary"  style="background-color: #014666; color: white;">Ingressar</a>
                        </div>
                    <div class="card-footer text-muted"  style="background-color: #014666; color: white;"></div>
                    </div>
          </div>
        </div>
    </div>
    

        
        </main>
    </div>
</main>

<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="../../COLABORADOR//COLEGAS/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
