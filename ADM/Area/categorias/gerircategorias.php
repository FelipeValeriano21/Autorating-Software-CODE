<?php
include('../../../LOGOFF/adm_credencial2.php');
include("../../../CONEXAOPHP/conexao.php");



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Categorias</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../../COLABORADOR/COLEGAS/assets/bootstrap/css/side.css">
    <link rel="stylesheet" href="../../../COLABORADOR/COLEGAS/assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="image/png" href="../../../LOGIN/assets/img/AUTORATING.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet">
    
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div style="color: white;" class="header_toggle "> <i class='bx bx-expand-horizontal' id="header-toggle"></i> </div>
        <h3></h3>
        <a href="../../../LOGOFF/autenticacao_adm.php" id="btn-sair" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span> </a>
    </header>
    <main>
        <div class="l-navbar" id="nav-bar">
            <nav class="nav">
                <div>
                    <a href="#" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                    <div class="img m-3">
                        <img class="rounded-circle mb-3 mt-4" src="../../../LOGIN/assets/img/AUTORATING.png" width="160" height="160" id="fotomenu">
                    </div>
                    <hr>
                    <div class="nav_list mt-4">
                        <a href="../Area.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a>
                        <a href="../gestores/gerirgestores.php" class="nav_link" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Gerir Gestores</span> </a>
                        <a href="../empresa/gerirempresa.php" class="nav_link"> <i class='bx bxs-business nav_icon'></i> <span class="nav_name">Gerir Empresas</span> </a>
                        <a href="gerircategorias.php" class="nav_link active"> <i class='bx bxs-category  nav_icon'></i> <span class="nav_name">Gerir Categorias</span> </a>
                    </div>
                </div>
            </nav>
        </div>

        <main>
            <br>
            <br>
            <br>
            <blockquote class="blockquote text-center">
            <h4 class="mb-1 p-4" >Gerenciamento de Categorias</h4>
            </blockquote>

            
            <?php

            if (isset($_SESSION['sucessoinsertcategoria'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                            <strong>Categoria cadastrada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['sucessoinsertcategoria'];
                        unset($_SESSION['sucessoinsertcategoria']);
                    }


                ?>

                <?php

                if (isset($_SESSION['errocategoria'])) {
                        ?>
                            <div class="alert alert-danger alert-dismissible fade show col-4" role="alert">
                                <strong>Algo deu errado!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            echo $_SESSION['errocategoria'];
                            unset($_SESSION['errocategoria']);
                        }


                    ?>
            
            <?php

            if (isset($_SESSION['sucessoupdatecategoria'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                            <strong>Categoria atualizada com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['sucessoupdatecategoria'];
                        unset($_SESSION['sucessoupdatecategoria']);
                    }


                ?>
                    



            <hr>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalinsertcategoria" data-whatever="@mdo">Adicionar categoria <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg></button>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 text-nowrap"></div>
                    <div class="col-md-6">
                        <div class="text-md-end dataTables_filter" id="dataTable_filter">
                        </div>
                    </div>
                </div>
                <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                    <table class="table align-middle mb-0 bg-white">
                        <thead class="bg-light">
                            <tr>
                                <th>ID</th>
                                <th>NOME</th>
                                <th>AÇÕES</th>
                            </tr>
                        </thead>
                        <tbody>
                    <?php
                    // Realize a consulta ao banco de dados para obter os dados
                    $query = "SELECT idTB_Categoria, Categoria_nome FROM tb_categoria";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['idTB_Categoria'] . '</td>';
                            echo '<td>' . $row['Categoria_nome'] . '</td>';
                            echo '<td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal' . $row['idTB_Categoria'] . '" data-whatever="@mdo">Editar</button>
        
                            <!-- Modal de edição -->
                            <div class="modal fade" id="exampleModal' . $row['idTB_Categoria'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #014666; color: white;">
        
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Categoria</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="updatecategoria.php" method="post"  id="updatecategoria">

                                            <div class="form-group">
                                            <label for="nome">ID</label>
                                            <input type="text" class="form-control" id="idTB_Categoria" name="idTB_Categoria" placeholder="Digite o nome" value="' . $row['idTB_Categoria'] . '" readonly>

                                            </div>
                                             
                                                <div class="form-group">
                                                    <label for="nome">Nome</label>
                                                    <input type="text" class="form-control" id="Categoria_Nome" name="Categoria_Nome" placeholder="Digite o nome" value="' . $row['Categoria_nome'] . '" maxlength="35" >
                                                </div>
                                         
                                            
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-primary" value="Salvar Alterações" onclick = "validaupdate(event)" style="background-color: #014666; color: white;">
                                        </div></form>
                                    </div>
                                </div>
                            </div>
        
                           
                        </td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Nenhum registro encontrado.</td></tr>';
                    }
                    ?>
                </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center"></div>
                    <div class="col-md-6"></div>
                </div>
               

<div class="modal fade" id="modalinsertcategoria" tabindex="-1" role="dialog" aria-labelledby="modalinsertcategoria" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header" style="background-color: #014666; color: white;">

        <h5 class="modal-title" id="exampleModalLabel">Adicionar Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="insert_categoria.php" method="post" id="insertcategoria">
          <div class="form-group">
            <label for="name">Nome</label>
            <input type="text" class="form-control " id="categoria" name="categoria" placeholder="Digite a categoria" maxlength="35" >
          </div>
  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <input type="submit" class="btn btn-primary" value="Enviar mensagem" onclick="validacategoria(event)" style="background-color: #014666; color: white;">
      </div>   </form>
    </div>
  </div>
</div>

            </div>
</main>


<script>
  function validacategoria(event) {
    
    var categoria = $('#categoria').val();

    
    if (categoria !== "" || categoria.length >= 35) {
      $('#insertcategoria').unbind('submit').submit();
        }else{
         

            alert("Campos em branco ou texto muito longo");
            event.preventDefault();
        }
    } 

    function validaupdate(event) {
    
    var categoria = $('#Categoria_Nome').val();

    
    if (categoria !== "" && categoria.length <= 35) {
      $('#updatecategoria').unbind('submit').submit();
        }else{
         

            alert("Campos em branco ou texto muito longo para atualizar");
            event.preventDefault();
        }
    } 

</script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../../COLABORADOR/COLEGAS/assets/js/chart.min.min.js"></script>
<script src="../../../COLABORADOR/COLEGAS/assets/js/script.min.js"></script>
<script src="../../../COLABORADOR/COLEGAS/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
