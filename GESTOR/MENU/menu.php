<?php
include('../../LOGOFF/verifica_credencial.php');
include '../../ConexaoPHP/conexao.php';




$cpf = $_SESSION['cpf'];

// Consulta para obter dados do colaborador
$procedure = "SELECT * FROM tb_Gestor WHERE Gestor_CPF = '$cpf'";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $foto = $dados['Gestor_Foto'];
    $nome = $dados['Gestor_Nome'];

    if($foto==""){
        $foto = "avatar.png";
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Autorating</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
     <link rel="shortcut icon" type="imagex/png" href="../../LOGIN//assets//img/AUTORATING.png">
     <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
     <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<style>
    
    .card-header{

        background-color: rgb(0, 87, 127);
        color: white;

    }

    .btn{

        background-color: rgb(0, 87, 127);

    }

    .card{

        border: 1px solid black;

    }
</style>
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
               <img class="rounded-circle mb-3 mt-4" src="../Colegas/assets/img/avatar.png" width="160" height="160" id="fotomenu">
               
              </div>
               <hr>
                <div class="nav_list mt-4">
                     <a href="menu.php" class="nav_link active"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a> 
                     <a href="../COLEGAS/colegas.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a> 
                     <a href="../PESQUISAS/Base/Pesquisas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a> 
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
        <h3 class="mb-1 p-4" >AUTORATING SOFTWARE</h3>
      </blockquote>

   

      <div class="alert alert-warning alert-dismissible fade show col-4" data-aos="fade-right" role="alert" style="background-color: #4d9e58; color: white; border-radius: 0;">
      Bem-vindo(a) de volta Gestor(a) <strong><b><?php echo $nome ?></strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
   <hr>
<br>

    <div class="container">
        <div class="row">
            <div class="col-sm">
                 <div class="card text-center">
                        <div class="card-header">GERIR COLABORADORES
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                        <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
                        </svg>
                        </div>
                    <div class="card-body">            
                        <a href="../COLEGAS/colegas.php" class="btn btn-primary">Ingressar</a>
                        </div>
                    <div class="card-footer text-muted"></div>
                    </div>
            </div>
            <div class="col-sm">
            <div class="card text-center">
                        <div class="card-header">GERIR AVALIAÇÕES
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16">
                            <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"/>
                            <path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"/>
                            </svg>
                        </div>
                    <div class="card-body">
                     
                        <a href="../PESQUISAS/Base/Pesquisas.php" class="btn btn-primary">Ingressar</a>
                        </div>
                    <div class="card-footer text-muted"></div>
                    </div>
            </div>
            <div class="col-sm">
            <div class="card text-center">
                        <div class="card-header">GERIR QUESTÕES
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-patch-question-fill" viewBox="0 0 16 16">
                        <path d="M5.933.87a2.89 2.89 0 0 1 4.134 0l.622.638.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636zM7.002 11a1 1 0 1 0 2 0 1 1 0 0 0-2 0zm1.602-2.027c.04-.534.198-.815.846-1.26.674-.475 1.05-1.09 1.05-1.986 0-1.325-.92-2.227-2.262-2.227-1.02 0-1.792.492-2.1 1.29A1.71 1.71 0 0 0 6 5.48c0 .393.203.64.545.64.272 0 .455-.147.564-.51.158-.592.525-.915 1.074-.915.61 0 1.03.446 1.03 1.084 0 .563-.208.885-.822 1.325-.619.433-.926.914-.926 1.64v.111c0 .428.208.745.585.745.336 0 .504-.24.554-.627z"/>
                        </svg>
                        </div>
                    <div class="card-body">
                  
                        <a href="../PERGUNTAS/Perguntas.php" class="btn btn-primary">Ingressar</a>
                        </div>
                    <div class="card-footer text-muted"></div>
                    </div>
          </div>
        </div>
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



<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>
