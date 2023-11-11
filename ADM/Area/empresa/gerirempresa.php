<?php 
include('../../../LOGOFF/adm_credencial2.php');

include("../../../CONEXAOPHP/conexao.php")

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Empresas</title>
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
                        <a href="gerirempresa.php" class="nav_link active"> <i class='bx bxs-business nav_icon'></i> <span class="nav_name">Gerir Empresas</span> </a>
                        <a href="../categorias/gerircategorias.php" class="nav_link"> <i class='bx bxs-category  nav_icon'></i> <span class="nav_name">Gerir Categorias</span> </a>
                    </div>
                </div>
            </nav>
        </div>

        <main>
            <br>
            <br>
            <br>
            <blockquote class="blockquote text-center">
                <h4 class="mb-1 p-4" >Gerenciamento de  Empresas</h4>
            </blockquote>
            <?php

          if (isset($_SESSION['updateempresa'])) {
                  ?>
                      <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                          <strong>Empresa atualizada com sucesso!</strong>
                          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  <?php
                      echo $_SESSION['updateempresa'];
                      unset($_SESSION['updateempresa']);
                  }
    ?>

      <?php

      if (isset($_SESSION['erroempresa'])) {
              ?>
                  <div class="alert alert-danger alert-dismissible fade show col-4" role="alert">
                      <strong>Algo deu errado!</strong>
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
              <?php
                  echo $_SESSION['erroempresa'];
                  unset($_SESSION['erroempresa']);
              }


      ?>

        <?php

        if (isset($_SESSION['desligaempresa'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                        <strong>Status da Empresa alterado com sucesso!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo $_SESSION['desligaempresa'];
                    unset($_SESSION['desligaempresa']);
                }
        ?>

            <hr>


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
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Dono</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Realize a consulta ao banco de dados para obter os dados
                    $query = "SELECT idEmpresa_Contratante, Empresa_nome, Empresa_email, Empresa_telefone, Empresa_dono, Empresa_status FROM empresa_contratante";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row['Empresa_nome'] . '</td>';
                            echo '<td>' . $row['Empresa_email'] . '</td>';
                            echo '<td>' . $row['Empresa_telefone'] . '</td>';
                            echo '<td>' . $row['Empresa_dono'] . '</td>';
                            echo '<td>' . $row['Empresa_status'] . '</td>';
                            if($row['Empresa_status'] == 0){
                              $status = "Ligar";
                            }else{                             
                              $status = "Desligar";
                               ;
                            }
                            echo '<td>
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal' . $row['idEmpresa_Contratante'] . '" data-whatever="@mdo">Editar</button>
        
                            <!-- Modal de edição -->
                            <div class="modal fade" id="exampleModal' . $row['idEmpresa_Contratante'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #014666; color: white;">
        
                                            <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="updateempresa.php" method="post" id="updateempresa">
                                            <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="id" name="idEmpresa_Contratante" placeholder="Digite o nome" value="' . $row['idEmpresa_Contratante'] . ' " readonly>
                                           </div>
                                             
                                                <div class="form-group">
                                                    <label for="nome">Nome</label>
                                                    <input type="text" class="form-control" id="nome" name="Empresa_Nome" placeholder="Digite o nome" value="' . $row['Empresa_nome'] . '"  maxlength="25">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email">Email</label>
                                                    <input type="text" class="form-control" id="email" name="Empresa_Email" placeholder="Digite o email" value="' . $row['Empresa_email'] . '"  maxlength="35">
                                                </div>
                                                <div class="form-group">
                                                    <label for="telefone">Telefone</label>
                                                    <input type="text" class="form-control" id="telefone" name="Empresa_Telefone" placeholder="Digite o telefone" value="' . $row['Empresa_telefone'] . '"  maxlength="15">
                                                </div>
                                                <div class="form-group">
                                                    <label for="status">Nome do Dono</label>
                                                    <input type="text" class="form-control" id="dono" name="Empresa_Dono" placeholder="Digite o status" value="' . $row['Empresa_dono'] . '"  maxlength="25">
                                                </div>
                                           
                                           
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <input type="submit" class="btn btn-primary" value="Salvar Alterações" onclick = "validaupdateempresa(event)" style="background-color: #014666; color: white;">
                                        </div> </form>
                                    </div>
                                </div>
                            </div>
        
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#desligarModal' . $row['idEmpresa_Contratante'] . '">'. $status .'</button>
        
                            <!-- Modal de desligar -->
                            <div class="modal fade" id="desligarModal' . $row['idEmpresa_Contratante'] . '" tabindex="-1" role="dialog" aria-labelledby="desligarLabel' . $row['idEmpresa_Contratante'] . '" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header" style="background-color: #014666; color: white;">
        
                                            <h5 class="modal-title" id="desligarLabel' . $row['idEmpresa_Contratante'] . '">'. $status .' Empresa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Deseja mesmo <b>'. $status .'</b> a Empresa <b>' . $row['Empresa_nome'] . '</b>?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <a class="btn btn-primary" style="background-color: #014666; color: white;" href="desligaempresa.php?idEmpresa_Contratante=' . $row['idEmpresa_Contratante'] . '">'. $status .'</a>
        
        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        </tr>';
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
          

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Empresa</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="name">CODIGO</label>
            <input type="text" class="form-control " id="name" placeholder="Digite o nome" disabled>
          </div>
          <br>
          <div class="form-group my-2">
            <label for="department">Departamento</label>
            <select class="form-control" id="department">
              <option value="financeiro">Financeiro</option>
              <option value="rh">Recursos Humanos</option>
              <option value="ti">Tecnologia da Informação</option>
              <option value="vendas">Vendas</option>
            </select>
          </div>
          <div class="form-group my-2">
            <label for="department">Empresa</label>
            <select class="form-control" id="department">
              <option value="financeiro">Financeiro</option>
              <option value="rh">Recursos Humanos</option>
              <option value="ti">Tecnologia da Informação</option>
              <option value="vendas">Vendas</option>
            </select>
          </div>
          <div class="form-group my-2">
            <label for="email">Nome</label>
            <input type="email" class = "form-control" id="email" placeholder="Digite o email">
          </div>
          <div class="form-group my-2">
            <label for="phone">Email</label>
            <input type="tel" class="form-control" id="phone" placeholder="Digite o telefone">
          </div>
          <div class="form-group my-2">
            <label for="phone">Adimissão</label>
            <input type="tel" class="form-control" id="phone" placeholder="Digite o telefone">
          </div>
          <div class="form-group my-2">
            <label for="phone">Senha</label>
            <input type="tel" class="form-control" id="phone" placeholder="Digite o telefone">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Enviar mensagem</button>
      </div>
    </div>
  </div>
</div>

            </div>
</main>




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
