<?php
include('../../../LOGOFF/adm_credencial2.php');

include("../../../CONEXAOPHP/conexao.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerir Gestores</title>
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
                        <a href="gerirgestores.php" class="nav_link active" > <i class='bx bx-group nav_icon'></i> <span class="nav_name">Gerir Gestores</span> </a>
                        <a href="../empresa/gerirempresa.php" class="nav_link"> <i class='bx bxs-business nav_icon'></i> <span class="nav_name">Gerir Empresas</span> </a>
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
                <h4 class="mb-1 p-4" >Gerenciamento de  Gestores</h4>
            </blockquote>

            <?php

            if (isset($_SESSION['erroinsertgestor'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show col-4" role="alert">
                            <strong>Algo de errado aconteceu!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['erroinsertgestor'];
                        unset($_SESSION['erroinsertgestor']);
                    }

      
                ?>

                
          <?php

            if (isset($_SESSION['cpf_duplicado'])) {
                    ?>
                        <div class="alert alert-danger alert-dismissible fade show col-3" role="alert">
                            <strong>CPF já cadastrado!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['cpf_duplicado'];
                        unset($_SESSION['cpf_duplicado']);
                    }


                ?>

            <?php

            if (isset($_SESSION['sucessoinsertgestor'])) {
                    ?>
                        <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                            <strong>Gestor cadastrado com sucesso!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        echo $_SESSION['sucessoinsertgestor'];
                        unset($_SESSION['sucessoinsertgestor']);
                    }


                ?>

                
            <?php

                if (isset($_SESSION['sucessoupdategestor'])) {
                        ?>
                            <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                                <strong>Gestor atualizado com sucesso!</strong>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php
                            echo $_SESSION['sucessoupdategestor'];
                            unset($_SESSION['sucessoupdategestor']);
                        }


    ?>

<?php

        if (isset($_SESSION['desligagestor'])) {
                ?>
                    <div class="alert alert-success alert-dismissible fade show col-4" role="alert">
                        <strong>Status do gestor alterado com sucesso!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php
                    echo $_SESSION['desligagestor'];
                    unset($_SESSION['desligagestor']);
                }


        ?>

                

            <hr>

            <button type="button" class="btn btn-success"   data-toggle="modal" data-target="#insertgestor" data-whatever="@mdo">Adicionar novo Gestor <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-plus" viewBox="0 0 16 16">
                <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
                <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"/>
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
            <th>CPF</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Senha</th>
            <th>Empresa</th>
            <th>Departamento</th>
            <th>Status</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Realize a consulta ao banco de dados para obter os dados
        $query = "SELECT
        g.idTB_Gestor,
        g.Gestor_CPF,
        g.Gestor_Nome,
        g.Gestor_email,
        g.Gestor_telefone,
        g.Gestor_status,
        g.Gestor_nascimento,
        g.Gestor_Adimissao,
        g.Gestor_senha,
        d.Departamento_Nome,  -- Nome do Departamento
        ec.Empresa_Nome       -- Nome da Empresa Contratante
    FROM tb_gestor g
    JOIN tb_departamento d ON g.TB_Departamento_idTB_Departamento = d.idTB_Departamento 
    JOIN empresa_contratante ec ON g.Empresa_Contratante_idEmpresa_Contratante  = ec.idEmpresa_Contratante;
    ";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['Gestor_CPF'] . '</td>';
                echo '<td>' . $row['Gestor_Nome'] . '</td>';
                echo '<td>' . $row['Gestor_email'] . '</td>';
                echo '<td>' . $row['Gestor_telefone'] . '</td>';
                echo '<td>' . $row['Gestor_senha'] . '</td>';
                echo '<td>' . $row['Empresa_Nome'] . '</td>';
                echo '<td>' . $row['Departamento_Nome'] . '</td>';
                echo '<td>' . $row['Gestor_status'] . '</td>';
                if($row['Gestor_status'] == 0){
                    $status = "Ligar";
               
                  }else{                             
        
                    $status = "Desligar";
                     
                  }
                echo '<td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal' . $row['idTB_Gestor'] . '" data-whatever="@mdo">Editar</button>

                    <!-- Modal de edição -->
                    <div class="modal fade" id="exampleModal' . $row['idTB_Gestor'] . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header" style="background-color: #014666; color: white;">

                                    <h5 class="modal-title" id="exampleModalLabel">Editar Gestor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="updategestor.php" method="post">
                                    <div class="form-group">
                                    <label for="cpf">ID</label>
                                    <input type="text" class="form-control" id="id" name="idTB_Gestor" maxlength="14" placeholder="Digite o CPF" value="' . $row['idTB_Gestor'] . ' " readonly="">
                                     </div>
                                        <div class="form-group">
                                            <label for="cpf">CPF</label>
                                            <input type="text" class="form-control" id="cpfedita" name="cpf" maxlength="14" placeholder="Digite o CPF" value="' . $row['Gestor_CPF'] . ' " readonly="">
                                        </div>
                                        <div class="form-group">
                                            <label for="nome">Nome</label>
                                            <input type="text" class="form-control" id="nomeedita" name="nome" placeholder="Digite o nome" value="' . $row['Gestor_Nome'] . '" maxlength="30">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control" id="emailedita" name="email" placeholder="Digite o email" value="' . $row['Gestor_email'] . '" maxlength="35">
                                        </div>
                                        <div class="form-group">
                                            <label for="telefone">Telefone</label>
                                            <input type="text" class="form-control" id="telefoneedita" name="telefone" placeholder="Digite o telefone" value="' . $row['Gestor_telefone'] . '" maxlength="15">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Data de Nascimento</label>
                                            <input type="date" class="form-control" id="nascimentoedita" name="nascimento" placeholder="Digite o status" value="' . $row['Gestor_nascimento'] . '" >
                                        </div>
                                   
                                 
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                    <input type="submit" class="btn btn-primary" value="Salvar Alterações" style="background-color: #014666; color: white;">
                                </div>   </form>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#desligarModal' . $row['idTB_Gestor'] . '">'. $status.'</button>

                    <!-- Modal de desligar -->
                    <div class="modal fade" id="desligarModal' . $row['idTB_Gestor'] . '" tabindex="-1" role="dialog" aria-labelledby="desligarLabel' . $row['idTB_Gestor'] . '" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header" style="background-color: #014666; color: white;">

                                    <h5 class="modal-title" id="desligarLabel' . $row['idTB_Gestor'] . '">Desligar Gestor</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Deseja mesmo <b>'. $status . ' </b> o(a) gestor(a) <b>' . $row['Gestor_Nome'] . '</b>?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                    <a class="btn btn-primary" style="background-color: #014666; color: white;" href="desligagestor.php?idTB_Gestor=' . $row['idTB_Gestor'] . '">'. $status .'</a>


                                </div>
                            </div>
                        </div>
                    </div>
                </td>
                </tr>';
            }
        } else {
            echo '<tr><td colspan="6">Nenhum registro encontrado.</td></tr>';
        }
        ?>
    </tbody>
</table>


                </div>
                <div class="row">
                    <div class="col-md-6 align-self-center"></div>
                    <div class="col-md-6"></div>
                </div>
            

            <!----------------------------------------------------------------------------------------------------------------------->
               

            <div class="modal fade" id="insertgestor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header" style="background-color: #014666; color: white;">

                    <h5 class="modal-title" id="exampleModalLabel">Novo Gestor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="insertgestor.php" method="post" id="inserirgestor">
                    <div class="form-group">
                        <label for="name">CPF</label>
                        <input type="text" class="form-control " id="cpf" name="cpf" maxlength = "14" placeholder="Digite o CPF">
                    </div>
                    <br>
                    <div class="form-group my-2">
                    <label for="department">Empresa</label>
                    <select class="form-control" name="empresa">
                        <?php
                        $query = "SELECT idEmpresa_Contratante, Empresa_Nome FROM empresa_contratante";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['idEmpresa_Contratante'] . '">' . $row['Empresa_Nome'] . '</option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma empresa encontrada</option>';
                        }
                        ?>
                        </select>
                    </div>
                        <div class="form-group my-2">
                    <label for="department">Departamento</label>
                    <select class="form-control" name="departamento">
                        <?php
                        $query = "SELECT idTB_Departamento, Departamento_Nome FROM tb_departamento";
                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="' . $row['idTB_Departamento'] . '">' . $row['Departamento_Nome'] . '</option>';
                            }
                        } else {
                            echo '<option value="">Nenhuma empresa encontrada</option>';
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group my-2">
                        <label for="email">Nome</label>
                        <input type="text" class = "form-control" id="nome" name="nome" placeholder="Digite o nome" maxlength="30">
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Digite o email" maxlength="35">
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Adimissão</label>
                        <input type="date" class="form-control" id="adimissao" name="adimissao">
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Nascimento</label>
                        <input type="date" class="form-control" id="nascimento" name="nascimento" >
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control" id="telefone" name="telefone" placeholder="Digite o telefone" maxlength="15">
                    </div>
                    <div class="form-group my-2">
                        <label for="phone">Senha</label>
                        <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite a senha" maxlength="40">
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <input type="submit" class="btn btn-primary" value="Enviar mensagem" onclick="teste(event)">
                </div>        </form>
                </div>
            </div>
            </div>



</div>
</main>
<script>
        document.getElementById('cpf').addEventListener('input', function (e) {
            let value = e.target.value;
            value = value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o primeiro ponto
            value = value.replace(/(\d{3})(\d)/, '$1.$2'); // Adiciona o segundo ponto
            value = value.replace(/(\d{3})(\d{2})$/, '$1-$2'); // Adiciona o traço

            e.target.value = value;
        });

       

function teste(event) {
    const cpf = $('#cpf').val();
    const nome = $('#nome').val();
    const email = $('#email').val();
    const telefone = $('#telefone').val();
    const nascimento = $('#nascimento').val();
    const adimissao = $('#adimissao').val();
    const senha = $('#senha').val();



    if (cpf !== "" && nome !== "" && email !== "" && telefone !== "" && nascimento !== "" && adimissao !== "" && senha !== "") {
    
    if (validarCPF(cpf)) {             
                $('#inserirgestor').unbind('submit').submit(); 
            
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
        console.log("Validando CPF:", cpf); 
    }

    return true; // CPF válido
    console.log("Validando CPF:", cpf); 
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

