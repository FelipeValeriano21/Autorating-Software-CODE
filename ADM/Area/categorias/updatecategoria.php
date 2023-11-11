<?php
include '../../../CONEXAOPHP/conexao.php';

session_start();

if (isset($_POST['idTB_Categoria'])) {
    $idTB_Categoria = $_POST['idTB_Categoria'];
    $Categoria_Nome = $_POST['Categoria_Nome'];


        $updateQuery = "UPDATE tb_categoria SET Categoria_Nome = '$Categoria_Nome' WHERE idTB_Categoria = '$idTB_Categoria'";
        if (mysqli_query($conn, $updateQuery)) {
            header('location: gerircategorias.php');
            $_SESSION['sucessoupdatecategoria'] = "";
            exit; // Saia do script após o redirecionamento
        } else {

            header('location: gerircategorias.php');
            $_SESSION['errocategoria'] = "";
    
        }
    } 

mysqli_close($conn);
?>
