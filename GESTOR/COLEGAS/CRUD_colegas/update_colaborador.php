<?php
include '../../../ConexaoPHP/conexao.php';

session_start();

if (isset($_POST['idTB_Colaborador'])) {
    $idTB_Colaborador = $_POST['idTB_Colaborador'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $nascimento = $_POST['nascimento'];
    $funcao = $_POST['funcao'];

    $procedure = "SELECT Colaborador_CPF, Colaborador_Foto FROM TB_Colaborador WHERE idTB_Colaborador = '$idTB_Colaborador'";

    $sql = mysqli_query($conn, $procedure) or die(mysqli_error($conn));

    while ($dados = mysqli_fetch_assoc($sql)) {
        $cpf = $dados['Colaborador_CPF'];
        $imagem_atual = $dados['Colaborador_Foto'];
    }

    if($nome != "" && $email != "" && $telefone != "" && $nascimento != "" && $funcao != "" ) {

    // Processa o upload da nova imagem, se fornecida
    if (!empty($_FILES["imagem"]["name"])) {
        $target_dir = "../../../COLABORADOR/UPLOADS_IMAGENS/";
        $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $new_file_name = $cpf . "." . $imageFileType;
        $uploadOk = 1;

        // Verifica se o arquivo é uma imagem real
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if ($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "O arquivo não é uma imagem.";
            $uploadOk = 0;
        }

        // Verifica o tamanho máximo do arquivo (1MB)
        if ($_FILES["imagem"]["size"] > 1000000) {
            echo "Desculpe, o arquivo é muito grande. O tamanho máximo permitido é 1MB.";
            $uploadOk = 0;
        }

        // Permitir apenas formatos de imagem específicos (JPEG, JPG, PNG)
        if ($imageFileType != "jpg" && $imageFileType != "jpeg" && $imageFileType != "png") {
            echo "Desculpe, apenas arquivos JPG, JPEG e PNG são permitidos.";
            $uploadOk = 0;
        }

        // Verifica se $uploadOk é igual a 0 por algum erro
        if ($uploadOk == 0) {
            echo "Desculpe, o arquivo não foi enviado.";
        } else {
            // Move o arquivo para o diretório de uploads
            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_dir . $new_file_name)) {
                // Define o nome do arquivo para a nova imagem
                $arquivo_nome = $target_dir . $new_file_name;
            } else {
                echo "Erro ao enviar o arquivo.";
            }
        }
    } else {
        // Se nenhum arquivo foi carregado, mantenha a imagem atual no banco de dados
        $arquivo_nome = $imagem_atual;
    }

    // Atualize as informações no banco de dados, incluindo a imagem
    $sql = "UPDATE `tb_colaborador` SET `Colaborador_Nome`='$nome', `Colaborador_Email`='$email', `Colaborador_Nascimento`='$nascimento', `Colaborador_Telefone`='$telefone', `Colaborador_Foto`='$arquivo_nome', `Colaborador_Funcao`='$funcao' WHERE idTB_Colaborador='$idTB_Colaborador'";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['status_editar'] = "";
        header("location: ../colegas.php");
    } else {
        header('location: ../colegas.php');
        $_SESSION['Errogenerico'] = "";
    }

}else{

    header("Location: ../colegas.php");
    $_SESSION['erros_camposvazios'] = "";

}
    
} else {
 
}$conn->close();
?>



