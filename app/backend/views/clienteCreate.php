<?php

session_start();
$_SESSION['empresasList'] = $empresas;

header('Location: ../../front-end/cadastro.php');

die();