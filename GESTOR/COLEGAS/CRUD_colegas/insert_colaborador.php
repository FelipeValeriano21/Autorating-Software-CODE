<?php
include '../../../CONEXAOPHP/conexao.php';

session_start();

$cpf = $_SESSION['cpf'];

$procedure = "SELECT idTB_Gestor FROM TB_Gestor WHERE Gestor_CPF = ?";

if ($stmt = $conn->prepare($procedure)) {
    $stmt->bind_param("s", $cpf);
    $stmt->execute();
    $stmt->bind_result($idTB_Gestor);

    while ($stmt->fetch()) {
    }

    $stmt->close();
} else {
    die("Erro na consulta: " . $conn->error);
    header('location: ../colegas.php');
    $_SESSION['Errogenerico'] = "";
}

$cpfcolab = $_POST['cpf'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$nascimento = $_POST['nascimento'];
$admissao = $_POST['admissao'];
$funcao = $_POST['funcao'];
$senha = $_POST['senha'];
$confirmarsenha = $_POST['confirmarsenha'];
$imagem = $_FILES['imagem'];

$consulta = "SELECT COUNT(*) AS total FROM TB_colaborador WHERE Colaborador_CPF = ?";

if ($stmt = $conn->prepare($consulta)) {
    $stmt->bind_param("s", $cpfcolab);
    $stmt->execute();
    $stmt->bind_result($total);

    $stmt->fetch();

    $stmt->close();
} else {
    die("Erro na consulta: " . $conn->error);
    header('location: ../colegas.php');
    $_SESSION['Errogenerico'] = "";
}

$arquivo_nome = null;

if ($total > 0) {
    header('location: teladeinsert.php');
    $_SESSION['status_cpfjacadastrado'] = "";
} else {
    if (empty($imagem['name'])) {

        $imagem = null; 
        
        $sql = "INSERT INTO `tb_colaborador` (`TB_Gestor_idTB_Gestor`, `Colaborador_Nome`, `Colaborador_CPF`, `Colaborador_Email`, `Colaborador_Nascimento`, `Colaborador_Telefone`, `Colaborador_Adimissao`, `Colaborador_Senha`, `Colaborador_Status`, `Colaborador_Foto`, `Colaborador_Funcao`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        if ($stmt = $conn->prepare($sql)) {
            $status = 1;

            $stmt->bind_param("sssssssssss", $idTB_Gestor, $nome, $cpfcolab, $email, $nascimento, $telefone, $admissao, $senha, $status, $imagem , $funcao);

            if ($stmt->execute()) {
                $_SESSION['status_insert'] = "";
                header("location: ../colegas.php");
            } else {
                echo "Error: " . $stmt->error;
                header('location: ../colegas.php');
                $_SESSION['Errogenerico'] = "";
            }

            $stmt->close();
        } else {
            die("Erro na consulta: " . $conn->error);
            header('location: ../colegas.php');
            $_SESSION['Errogenerico'] = "";
        }
    } else {
        if ($_FILES["imagem"]["name"]) {
            $target_dir = "../../../COLABORADOR/UPLOADS_IMAGENS/";
            $target_file = $target_dir . basename($_FILES["imagem"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            $new_file_name = $cpfcolab . "." . $imageFileType;
            $uploadOk = 1;

            $check = getimagesize($_FILES["imagem"]["tmp_name"]);
            if ($check === false) {
                header('location: teladeinsert.php');
                $_SESSION['status_Problemascomaimagem'] = "";
            }

            if (file_exists($target_file)) {
                header('location: teladeinsert.php');
                $_SESSION['status_Problemascomaimagem'] = "";
            }

            if ($_FILES["imagem"]["size"] > 1000000) {
                header('location: teladeinsert.php');
                $_SESSION['status_Problemascomaimagem'] = "";
            }

            if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $target_dir . $new_file_name)) {
                $arquivo_nome = $target_dir . $new_file_name;
                $sql = "INSERT INTO `tb_colaborador` (`TB_Gestor_idTB_Gestor`, `Colaborador_Nome`, `Colaborador_CPF`, `Colaborador_Email`, `Colaborador_Nascimento`, `Colaborador_Telefone`, `Colaborador_Adimissao`, `Colaborador_Senha`, `Colaborador_Status`, `Colaborador_Foto`, `Colaborador_Funcao`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

                if ($stmt = $conn->prepare($sql)) {
                    $status = 1; // Define o status

                    $stmt->bind_param("sssssssssss", $idTB_Gestor, $nome, $cpfcolab, $email, $nascimento, $telefone, $admissao, $senha, $status, $arquivo_nome, $funcao);

                    if ($stmt->execute()) {
                        $_SESSION['status_insert'] = "";
                        header("location: ../colegas.php");
                    } else {
                        echo "Error: " . $stmt->error;
                        header('location: teladeinsert.php');
                        $_SESSION['status_Problemascomaimagem'] = "";
                    }

                    $stmt->close();
                } else {
                    die("Erro na consulta: " . $conn->error);
                    header('location: teladeinsert.php');
                    $_SESSION['status_Problemascomaimagem'] = "";
                }
            } else {
                header('location: teladeinsert.php');
                $_SESSION['status_Problemascomaimagem'] = "";
            }
        }
    }
}
?>
