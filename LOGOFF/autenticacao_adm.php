<?php
session_start(); 
session_unset();
session_destroy();
header("Location: ../ADM/index.php");
exit();
?>
