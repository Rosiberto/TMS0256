<?php 

session_start();
function isAuthenticated() {
    return isset($_SESSION['usuario_id']);
}

function requireAuth() {
    if (!isAuthenticated()) {
        header('Location: ../front-end/Login.php');
        exit;
    }
}
