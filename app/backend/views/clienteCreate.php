<?php

session_start();
$_SESSION['empresasList'] = $empresas;

header('Location: http://localhost/TMS0256/app/front-end/cadastro.php');

die(); 