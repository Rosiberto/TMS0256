<?php

session_start();
$_SESSION['empresaList'] = $empresaList;

header('Location: http://localhost/TMS0256/app/front-end/CadastroEmpregado.php');

die(); 