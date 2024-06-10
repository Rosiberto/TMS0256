<?php
session_start();
class LoginController extends Database {
    private $login;

    public function __construct() {
        $this->login = new LoginModel();
    }

    public function login() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $_POST['login'];
            $senha = $_POST['senha'];

            $usuario = $this->login->fetchByLogin($login);

            if ($usuario && $senha == $usuario['Senha']) {
                $_SESSION['usuario_id'] = $usuario['ID'];
                $_SESSION['usuario_login'] = $usuario['Login'];
                header('Location: ../front-end/LoginCliente.php');
                exit;
            } else {
                echo 'Login ou senha inválidos.';
            }
        }
    }

    public function logout() {
        session_unset();
        session_destroy();
        header('Location: ../front-end/Login.php');
        exit;
    }
}

$controller = new LoginController();

if ($_SERVER['REQUEST_URI'] == '/login' && $_SERVER['REQUEST_METHOD'] == 'POST') {
    $controller->login();
} elseif ($_SERVER['REQUEST_URI'] == '/logout') {
    $controller->logout();
}