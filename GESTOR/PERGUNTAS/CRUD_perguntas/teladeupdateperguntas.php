<?php
include('../../../LOGOFF/arearestrita.php');
include('../../../CONEXAOPHP/conexao.php');



$cpf = $_SESSION['cpf'];

$procedure = "select idTB_Gestor, Gestor_Foto from TB_Gestor where Gestor_CPF = '$cpf'";

$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

while ($dados = mysqli_fetch_assoc($sql)) {

    $foto = $dados['Gestor_Foto'];

    $quantidade_de_caracteres = 18; 
    $tratacaminhoimagem = substr($foto, - $quantidade_de_caracteres);
    
    $idTB_Gestor = $dados['idTB_Gestor']; 
    if($tratacaminhoimagem==""){
        $tratacaminhoimagem = "avatar.png";
    }

}
?>

<?php

if (isset($_GET['idTB_Questoes'])) {
    $idTB_Questoes = $_GET['idTB_Questoes'];

    $procedure = "select * from tb_questoes where idTB_Questoes = '$idTB_Questoes';";
  
    $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

    while ($dados = mysqli_fetch_assoc($sql)) {
        $idTB_Questoes = $dados['idTB_Questoes'];
        $comando = $dados['Questoes_Pergunta'];
        $respA = $dados['Questoes_A'];
        $respB = $dados['Questoes_B'];
        $respC = $dados['Questoes_C'];
        $respD = $dados['Questoes_D'];
        $Questao_Correta = $dados['Questao_Correta'];
        $TB_Categoria_idTB_Categoria = $dados['TB_Categoria_idTB_Categoria'];
        $TB_Tipo_Questao_idTB_Tipo_Questao = $dados['TB_Tipo_Questao_idTB_Tipo_Questao'];


    }

    // Faça o que você precisa com o valor de $id aqui
} else {

}
?>

<?php 

$procedure = "select Categoria_Nome from tb_categoria where idTB_Categoria = '$TB_Categoria_idTB_Categoria' ";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
while ($dados = mysqli_fetch_assoc($sql))
    $Categoria_Nome_setada = $dados['Categoria_Nome'];

?>

<?php 

$procedure = "select Tipo_Nome from tb_tipo_questao where idTB_Tipo_Questao = '$TB_Tipo_Questao_idTB_Tipo_Questao' ";
$sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
while ($dados = mysqli_fetch_assoc($sql))
    $Tipo_Questao_Nome_setada = $dados['Tipo_Nome'];

?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Pergunta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="../../PROFILE/assets/bootstrap/css/profile.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">
    <link rel="shortcut icon" type="imagex/png" href="../../../LOGIN/assets/img/AUTORATING.png">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet"/>
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
                <div> <a href="../../../LOGIN/teladelogin.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon' ></i> <span class="nav_logo-name">Autorating</span> </a>
                <div  class="img m-3"> 
                <img class="rounded-circle mb-3 mt-4" src="../../UPLOADS_IMAGENS/<?php echo $tratacaminhoimagem?>" width="160" height="160" id="fotomenu">
                </div>
                <hr>
                <div class="nav_list mt-4">
                        <a href="../../MENU/menu.php" class="nav_link"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_name">Menu</span> </a>
                        <a href="../../COLEGAS/colegas.php" class="nav_link"> <i class='bx bx-group nav_icon'></i> <span class="nav_name">Meu departamento</span> </a>
                        <a href="../../PESQUISAS/Base/Pesquisas.php" class="nav_link"> <i class='bx bx-check nav_icon'></i> <span class="nav_name">Realizadas</span> </a>
                        <a href="../../DASHBOARD/Dashboard.php" class="nav_link"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a>
                        <a href="../../PROFILE/profile.php" class="nav_link"> <i class='bx bx-user nav_icon'></i> <span class="nav_name">Dados Pessoais</span> </a>
                    </div>
                </div> 
            </nav>
        </div>
        <blockquote class="blockquote text-center">
            <h3 class="mb-1 p-4" ></h3>
        </blockquote>

        <br>
        <div>
        <div class="container-fluid">
            <h1 style="font-size: 28px;">Editar Questão</h1>
            <hr>

        

            
            <form id="editarquestao" action="update_perguntas.php" method="post"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control" type="hidden" name="to" value="email@awebsite.com">
            <div class="col-sm-5 col-md-1">
                    <div class="form-group mb-3"><input class="form-control" type="text" name="idTB_Questoes" id="idTB_Questoes"  value="<?php echo $idTB_Questoes?>" readonly></div>
                 </div>
   
            <div class="row">
                    <div class="col-md-6">
                        <div id="successfail-1"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-md-6" id="message-1">
                        <h2 class="h4"><small><small class="required-input"></small></small></h2>
                        <div class="form-group mb-3">
                            <div class="input-group"></div>
                            <div class="form-group mb-3"><label class="form-label" for="from-calltime" >Categoria da Questão</label>
                                <div class="input-group"><select class="form-select" id="from-calltime-4" name="categoria">
                                             <optgroup label="Escolha uma opção">
                                             <option value="<?php echo $TB_Categoria_idTB_Categoria  ?>" name = "categoria"  selected=""><?php echo $Categoria_Nome_setada ?></option>
                                             <?php 

                                                include '../../../CONEXAOPHP/conexao.php';
                                                $procedure = "select * from tb_categoria";
                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $idTB_Categoria  = $dados['idTB_Categoria'];
                                                    $Categoria_Nome = $dados['Categoria_Nome'];
                                             
                                                ?>
                                            <option value="<?php echo $idTB_Categoria  ?>" name = "categoria"  ><?php echo $Categoria_Nome ?></option>

                                        <?php } ?>
                    
                                        </optgroup>
                                    </select></div>
                                </div>
                            </div>
                            
                            <div class="form-group mb-3">
                            <div class="input-group" name="tipoquestao"></div>
                            <div class="form-group mb-3"><label class="form-label" for="from-calltime">Categoria da Questão</label>
                                <div class="input-group"><select class="form-select" id="from-calltime-4" name="tipoquestao">
                                             <optgroup label="Escolha uma opção">
                                             <option value="<?php echo $TB_Tipo_Questao_idTB_Tipo_Questao?>" name = "tipoquestao"  selected=""><?php echo $Tipo_Questao_Nome_setada ?></option>
                                             <?php 

                                                include '../../../CONEXAOPHP/conexao.php';
                                                $procedure = "select * from tb_tipo_questao";
                                                $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));
                                                while ($dados = mysqli_fetch_assoc($sql)){
                                                    $idTB_Tipo_Questao = $dados['idTB_Tipo_Questao'];
                                                    $Tipo_Nome = $dados['Tipo_Nome'];
                                             
                                                ?>
                                            <option value="<?php echo  $idTB_Tipo_Questao  ?>"  name="tipoquestao"><?php echo  $Tipo_Nome  ?></option>

                                        <?php } ?>
                    
                                        </optgroup>
                                    </select></div>
                                </div>
                            </div>


                        <div class="form-group mb-3"><label class="form-label" for="from-comments">Comando da Questão</label><textarea class="form-control" id="comando" name="comando" placeholder="Comando da Questão" rows="5" maxlength="255"><?php echo $comando ?></textarea></div>
                        <div class="form-group mb-3">
                            <div class="row">
                                <div class="col"><a href="../Perguntas.php" class="btn btn-danger d-block w-100" ><i class="fa fa-undo"></i>&nbsp;Voltar ao Menu</button></a></div>
                                <div class="col"><button class="btn btn-primary d-block w-100" type="submit" onclick="validaPergunta(event) " >Submeter Questão&nbsp;</button></div>
                            </div>
                        </div>
                        <hr class="d-flex d-md-none">
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group mb-3"><label class="form-label" for="from-calltime">Resposta A:</label>
                       <input class="form-control" id="respA" name="respA"  placeholder="Resposta A" value="<?php echo $respA ?>" maxlength="255">
                     </div>
                        <div class="form-group mb-3"><label class="form-label" for="from-calltime">Resposta B:</label>
                       <input class="form-control" id="respB" name="respB" placeholder="Resposta B" value="<?php echo $respB ?>" maxlength="255">
                        </div>
                        <div class="form-group mb-3"><label class="form-label" for="from-calltime">Resposta C:</label>
                       <input class="form-control" id="respC" name="respC" placeholder="Resposta C" value="<?php echo $respC ?>" maxlength="255">
                        </div>
                        <div class="form-group mb-3"><label class="form-label" for="from-calltime">Resposta D:</label>
                       <input class="form-control" id="respD" name="respD" placeholder="Resposta D" value="<?php echo $respD ?>" maxlength="255">
                        </div>
                        <div class="form-group mb-3"><label class="form-label" for="from-calltime">Reposta Correta:</label>
                            <div class="input-group"><select class="form-select" id="from-calltime-8" name="respcorreta">
                                    <optgroup label="Escolha uma opção">
                                        <option  value="<?php echo $Questao_Correta ?>" selected=""><?php echo $Questao_Correta ?></option>
                                        <option  value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                    </optgroup>
                                </select></div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="modal fade" role="dialog" tabindex="-1" id="modal1">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>Contact Information</h4><button class="btn-close" type="button" aria-label="Close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <form id="contactForm-2" action="insert.php" method="post"><input class="form-control" type="hidden" name="Introduction" value="This email was sent from www.awebsite.com"><input class="form-control" type="hidden" name="subject" value="Awebsite.com Contact Form"><input class="form-control" type="hidden" name="to" value="email@awebsite.com">
                            <div class="row">
                                <div class="col-md-6">
                                    <div id="successfail-2"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-md-6" id="message-2">
                                    <h2 class="h4"><i class="fa fa-envelope"></i> Contact Us<small><small class="required-input">&nbsp;(*required)</small></small></h2>
                                    <div class="form-group mb-3"><label class="form-label" for="from-name">Name</label><span class="required-input">*</span>
                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-user-o"></i></span><input class="form-control" type="text" id="from-name-2" name="name" required="" placeholder="Full Name"></div>
                                    </div>
                                    <div class="form-group mb-3"><label class="form-label" for="from-email">Email</label><span class="required-input">*</span>
                                        <div class="input-group"><span class="input-group-text"><i class="fa fa-envelope-o"></i></span><input class="form-control" type="text" id="from-email-2" name="email" required="" placeholder="Email Address"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="form-group mb-3"><label class="form-label" for="from-phone">Phone</label><span class="required-input">*</span>
                                                <div class="input-group"><span class="input-group-text"><i class="fa fa-phone"></i></span><input class="form-control" type="text" id="from-phone-2" name="phone" required="" placeholder="Primary Phone"></div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                                            <div class="form-group mb-3"><label class="form-label" for="from-calltime">Best Time to Call</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></div><select class="form-select" id="from-calltime-2" name="call time">
                                                        <optgroup label="Best Time to Call">
                                                            <option value="Morning" selected="">Morning</option>
                                                            <option value="Afternoon">Afternoon</option>
                                                            <option value="Evening">Evening</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3"><label class="form-label" for="from-comments">Comments</label><textarea class="form-control" id="from-comments-2" name="comments" placeholder="Enter Comments" rows="5"></textarea></div>
                                    <div class="form-group mb-3">
                                        <div class="row">
                                            <div class="col"><a href="../Perguntas.php"><button class="btn btn-primary d-block w-100" type="reset"><i class="fa fa-undo"></i> Reseta</button></a></div>
                                            <div class="col"><input class="btn btn-primary d-block w-100" type="submit">Submit <i class="fa fa-chevron-circle-right"></i></div>
                                        </div>
                                    </div>
                                    <hr class="d-flex d-md-none">
                                </div>
                                <div class="col-12 col-md-6">
                                    <h2 class="h4"><i class="fa fa-location-arrow"></i> Locate Us</h2>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="static-map"><a rel="noopener" href="https://www.google.com/maps/place/Daytona+International+Speedway/@29.1815062,-81.0744275,15z/data=!4m13!1m7!3m6!1s0x88e6d935da1cced3:0xa6b3e1bc0f2fc83a!2s1801+W+International+Speedway+Blvd,+Daytona+Beach,+FL+32114!3b1!8m2!3d29.187028!4d-81.0703076!3m4!1s0x88e6d949a4cb8593:0x1387c6c0b5c8cc97!8m2!3d29.1851681!4d-81.0705292" target="_blank"> <img class="img-fluid" src="http://maps.googleapis.com/maps/api/staticmap?autoscale=2&amp;size=600x210&amp;maptype=roadmap&amp;format=png&amp;visual_refresh=true&amp;markers=size:mid%7Ccolor:0xff0000%7Clabel:%7C582+1801+W+International+Speedway+Blvd+Daytona+Beach+FL+32114&amp;zoom=12" alt="Google Map of Daytona International Speedway"></a></div>
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <h2 class="h4"><i class="fa fa-user"></i> Our Info</h2>
                                            <div><span><strong>Name</strong></span></div>
                                            <div><span>email@awebsite.com</span></div>
                                            <div><span>www.awebsite.com</span></div>
                                            <hr class="d-sm-none d-md-block d-lg-none">
                                        </div>
                                        <div class="col-sm-6 col-md-12 col-lg-6">
                                            <h2 class="h4"><i class="fa fa-location-arrow"></i> Our Address</h2>
                                            <div><span><strong>Office Name</strong></span></div>
                                            <div><span>55 Icannot Dr</span></div>
                                            <div><span>Daytone Beach, FL 85150</span></div>
                                            <div><abbr data-toggle="tooltip" data-placement="top" title="Office Phone: 555-867-5309">O:</abbr> 555-867-5309</div>
                                            <hr class="d-sm-none">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
      

            

    </main>

    <!-- ... (scripts JavaScript) ... -->
</body>

<script>

function validaPergunta(event) {
    
    var comando = $('#comando').val();
    var respA = $('#respA').val();
    var respB = $('#respB').val();
    var respC = $('#respC').val();
    var respD = $('#respD').val();
    
    if (comando !== "" && respA !== "" && respB !== "" && respC !== "" && respD !== "") {
        if(comando.length > 255 || respA.length > 255 || respB.length > 255 || respC.length > 255 || respD.length > 255){
            alert("Diminua os caracteres");
            event.preventDefault();
        }else{
            $('#insertPeguntas').unbind('submit').submit();
        }
    } else {
        alert("Campos em branco");
      event.preventDefault();
    }
}




</script>
<script src="assets/bootstrap/js/bootstrap.min.js"></script>
<script src="assets/js/script.min.js"></script>
<script src="assets/js/chart.min.min.js"></script>       
<script src="../../PROFILE/assets/js/main.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</html>