<?php 

session_start();
$_SESSION['empresasList'] = $empresas;
$_SESSION['funcoesList'] = $funcionarioFuncao;

header('Location: ../../front-end/CadastroEmpregado.php');

die();

?>