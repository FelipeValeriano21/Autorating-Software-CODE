<?php

include('../../../CONEXAOPHP/conexao.php');

session_start();


?>

<?php

$categoria = $_POST['categoria'];

$sql = "INSERT INTO `tb_categoria`(`Categoria_Nome`) VALUES ('$categoria')";
if (mysqli_query($conn, $sql)) {

      header('location: gerircategorias.php');
      $_SESSION['sucessoinsertcategoria'] = "";
     
 

} else {
      header('location: gerircategorias.php');
      $_SESSION['errocategoria'] = "";
  

}



mysqli_close($conn);

?>