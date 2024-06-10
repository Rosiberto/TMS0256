<?php 

session_start();
$_SESSION['empresasList'] = $empresas;
$_SESSION['funcoesList'] = $funcoesEmpregado;

header('Location: ../../front-end/CadastroEmpregado.php');

die();

?>