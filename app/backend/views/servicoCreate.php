<?php 


session_start();
$empregadoList = $_SESSION['empregadoList'];

header('Location: http://localhost/TMS0256/app/front-end/cadastro.php');

die(); 

?>