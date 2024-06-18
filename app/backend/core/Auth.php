<?php 

session_start();
function isAuthenticated() {
    return isset($_SESSION['usuario_id']);
    return isset($_SESSION['cliente_id']);
    return isset($_SESSION['funcionario_id']);
}

function requireAuth() {
    if (!isAuthenticated()) {
        header('Location: ../front-end/Login.php');
        exit;
    }
}
