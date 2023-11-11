<?php

session_start();

if (!isset($_SESSION['cpf'])) {
    $loginPath = "../../../../Login/teladelogin.php";
    header("Location: $loginPath");
    exit();
}

include('../../../../CONEXAOPHP/conexao.php');


$cpf = $_SESSION['cpf'];

$procedure = "select idTB_Gestor, Gestor_Foto from TB_Gestor where Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));


while ($dados = mysqli_fetch_assoc($sql)) {

  $fotogest = $dados['Gestor_Foto'];

  $quantidade_de_caracteres = 18; 
  $tratacaminhoimagem = substr($fotogest, - $quantidade_de_caracteres);
  
  $idTB_Gestor = $dados['idTB_Gestor']; 
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
    <title>Nova Avaliação</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../PROFILE/assets/bootstrap/css/profile.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../../../../LOGIN/assets/img/AUTORATING.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> 
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
        <a href="../../../../LOGOFF/verifica_autenticacao.php" id="btn-sair" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a> 
    </header>
    <main>
    <style>
    /* Estiliza o controle de faixa aumentando a largura */
    #faixa {
      width: 100%; /* Aumenta a largura para 80% do elemento pai */
    }
  </style>
        <div class="l-navbar" id="nav-bar"> 
            <nav class="nav">
                <div> <a href="../../../../LOGIN/teladelogin.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                <div  class="img m-3"> 
                <img class="rounded-circle mb-3 mt-4" src="../../../COLEGAS/assets/img/avatar.png" width="160" height="160" id="fotomenu">
                </div>
                <hr>
                <div class="nav_list mt-4">
                        <a href="../../../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a>
                        <a href="../../../COLEGAS/colegas.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a>
                        <a href="../../../PESQUISAS/Base/Pesquisas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a>
                        <a href="../../../DASHBOARD/Dashboard.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="../../../PROFILE/profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div> 
            </nav>
        </div>

        <br>
          <br>
          <br>

                <blockquote class="blockquote text-center">
            <h3 class="mb-1 p-4" >Criando nova avaliação</h3>
        </blockquote>


  <form action="inserir_pesquisas.php" method="post">
    
    <div class="container">
        
        <div class="row">
          <div class="col-sm">
            <table class="table align-middle mb-0 bg-white">
                <thead class="bg-light">
                  <tr>
                    <th>Selecione os colaboradores</th>
                    

                  </tr>
                </thead>
                <tbody>
                <?php 
               

                      $procedure = "select * from TB_Colaborador where TB_Gestor_idTB_Gestor = '$idTB_Gestor' and Colaborador_Status = '1';";

                      $contar = "select count(idTB_Colaborador) from TB_Colaborador; ";

                      $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

                      while ($dados = mysqli_fetch_assoc($sql)){
                      $idTB_Colaborador = $dados['idTB_Colaborador'];
                      $nome = $dados['Colaborador_Nome']; 
                      $email = $dados['Colaborador_Email'];
                      $foto = $dados['Colaborador_Foto'];
                      ?>
                  <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <img
                            src="../../../COLEGAS/CRUD_colegas/<?php echo $foto ?>"
                            alt=""
                            style="width: 45px; height: 45px"
                            class="rounded-circle"
                            />
                        <div class="ms-3">
                          <p class="fw-bold mb-1"><?php echo $nome ?></p>
                          <p class="text-muted mb-0"><?php echo $email ?></p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <input type="checkbox" class="checkbox" name="colaborador_id[]" id="" value="<?php echo $idTB_Colaborador?>">
                    </td>
                  </tr>
                 
                 
                 <?php } ?>

                 <tr>
                    <td>
                      <div class="d-flex align-items-center">
                        <div class="ms-3">
                          <p class="fw-bold mb-1">SELECIONAR TODOS</p>
                        </div>
                      </div>
                    </td>
                    <td>
                      <input type="checkbox" name="" id="selecionarTodas" >
                    </td>
                  </tr>

                </tbody>
              </table>
          </div>
          <div class="col-sm">
            <div class="container">
                <div class="row">
                  <div class="col">
                    <div class="container mt-5">
                        
                       
                          <div class="form-group">
                            <label for="textoInput" class="font-weight-bold">Data de inicio:</label>
                            <input type="date" class="form-control" id="datainicio" name="datainicio" placeholder="Digite seu texto">
                          </div>
                          <div class="form-group" >
                            <label for="textoInput" class="font-weight-bold">Data do término:</label>
                            <input type="date" class="form-control" id="datafim" name="datafim" placeholder="Digite seu texto">
                          </div>
                          <div class="form-group">
                          <label for="textoInput" class="font-weight-bold">Quantidade de questões:</label>
                          <input type="range" id="faixa" min="5" max="15" step="1" value="50" name="qtd">
                          
                         <p>Questões: <span id="valorSelecionado">15</span></p>
                          </div>                        
                      </div>
                  </div>

              
                  <div class="w-100"></div>
            
                  <div class="col">                    
                   <br>

                    <div class="form-group">
                        <label for="textoTextarea" class="font-weight-bold"s>Descrição da Pesquisa:</label>
                        <textarea class="form-control" id="descricao" name="descricao" rows="5" placeholder="Digite seu texto aqui"></textarea>
                      </div>
                  </div>
                </div>
              </div>
          </div>
          <div class="col-sm">
            <div class="form-outline">
                <table class="table align-middle mb-0 bg-white">
                    <thead class="bg-light">
                      <tr>
                      <th>Selecione as categorias</th>
                      <th></th>
                      <th>Quantidade</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php 
               

               $procedure = "SELECT tb_categoria.Categoria_Nome, tb_categoria.idTB_Categoria, COUNT(tb_questoes.TB_Categoria_idTB_Categoria) AS CountQuestoes
               FROM tb_categoria 
               LEFT JOIN tb_questoes ON tb_categoria.idTB_Categoria = tb_questoes.TB_Categoria_idTB_Categoria
               WHERE tb_questoes.TB_Gestor_idTB_Gestor = '$idTB_Gestor' and Questao_Status = '1'
               GROUP BY tb_categoria.Categoria_Nome, tb_categoria.idTB_Categoria";
               

            $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
 
           while ($dados = mysqli_fetch_assoc($sql)){
             $id_categoria = $dados['idTB_Categoria'];
            $Categoria_Nome = $dados['Categoria_Nome'];
            $CountQuestoes = $dados['CountQuestoes'];
              // Agora você pode usar $Categoria_Nome e $CountQuestoes como desejar.

        
               ?>
                      <tr>
                        <td>
                          <div class="d-flex align-items-center">
                       
                            <div class="ms-3">
                              <p class="fw-bold mb-1"><?php echo $Categoria_Nome?></p>
                            </div>
                          </div>
                        </td>
                        <td>
                          <input type="checkbox" name="categoria[]" id="" class="checkboxcategoria" value="<?php echo $id_categoria?>">
                        </td>
                        <td>
                          <p id="" class="result"><?php echo $CountQuestoes ?></p>
                        </td>
                      </tr>   
                      <?php } ?>  
                    </tbody>
                  </table>
          </div>
        </div>
          <div class="container mt-5">
       
          
                <div class="text-right"> 
                <a class="btn btn-danger" href="../Pesquisas.php">Voltar</a>
                  <input type="submit" class="btn btn-primary" id="submit-button" value="Criar Questionario">
                </div>
            </div>
        </div>
        </div>
        </form> 
        </div>
    </main>

    
    <footer class="sticky-footer">
        <div class="container my-auto">
            <div class="text-center my-auto copyright"><span>©TECHNOTRIBEMLV2023</span></div>
        </div>
      </footer> 

    <!-- ... (scripts JavaScript) ... -->

</body>


<script>
document.getElementById('submit-button').addEventListener('click', function(event) {
  var checkboxes = document.querySelectorAll('.checkbox');
  var checkboxcategoria = document.querySelectorAll('.checkboxcategoria');
  var result = document.querySelectorAll('.result');
  var checked = false;
  var checkedcategoria = false;
  var datainicio = $('#datainicio').val();
  var datafim = $('#datafim').val();
  var descricao = $('#descricao').val();
  var faixa = $('#faixa').val();
  var qtdquestoes = 0;


  for (var i = 0; i < checkboxes.length; i++) {
    if (checkboxes[i].checked) {
      checked = true;
      break;
    }
  }

  for (var i = 0; i < checkboxcategoria.length; i++) {
    if (checkboxcategoria[i].checked) {
      var numero = parseInt(result[i].textContent); // Converte o texto para número
      qtdquestoes += numero; // Acumula os números
      checkedcategoria = true;
    }
  }

  if (checked) {
    if(datainicio !== "" && datafim !== "" && descricao !== "" && faixa !== ""){
      if(checkedcategoria){
        if(qtdquestoes>=faixa){
        }else{
          alert("Não há questões registradas o suficiente");
          event.preventDefault();
        }
      }else{
        alert("Nenhuma categoria foi selecionada");
        event.preventDefault();
      }
    }else{
      alert('Preencha todos os campos');
      event.preventDefault();
    }
  }else{
    alert('Nenhum colaborador foi selecionado');
    event.preventDefault();
    return false; // Impede o envio do formulário
  }
});
</script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  // Captura o elemento de entrada do tipo range
  var faixa = document.getElementById("faixa");
  // Captura o elemento onde exibiremos o valor selecionado
  var valorSelecionado = document.getElementById("valorSelecionado");

  // Adiciona um ouvinte de evento de mudança ao controle de faixa
  faixa.addEventListener("input", function() {
    // Atualiza o valor exibido com o valor selecionado pelo controle de faixa
    valorSelecionado.textContent = faixa.value;
  });
</script>


<script>
    // Obtém todas as checkboxes com a classe "checkbox"
    const checkboxes = document.querySelectorAll('.checkbox');
    
    // Obtém a checkbox "Selecionar Todas" pelo ID
    const selecionarTodas = document.getElementById('selecionarTodas');
    
    // Adiciona um ouvinte de eventos à checkbox "Selecionar Todas"
    selecionarTodas.addEventListener('change', function() {
      checkboxes.forEach(checkbox => {
        checkbox.checked = selecionarTodas.checked;
      });
    });
  </script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="../../../PROFILE/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>