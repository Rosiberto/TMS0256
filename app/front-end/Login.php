<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Hotelaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .login-section {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            margin-left: auto;
            margin-right: auto;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>
<body>
    <!-- Barra de Navegação (Header)-->
    <nav class="navbar d-flex justify-content-evenly border fs-3">
        <a class="nav-link active p-3" aria-current="page" href="home.html">CRM4SH.com</a>          
        <a class="nav-link active p-3" aria-current="page" href="home.html#informacoes">Informações</a>        
        <a class="nav-link active p-3" href="home.html#servicos">Serviços</a>
        <a class="nav-link active p-3" href="imoveisFiltro.html">Imóveis Disponíveis</a>                       

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-dark dropdown-toggle fs-4" data-bs-toggle="dropdown" aria-expanded="false">
                Acessar
            </button>
            <ul class="dropdown-menu">
                <li><a class="dropdown-item fs-4" href="Login.php">Acessar</a></li>
                <li><a class="dropdown-item fs-4" href="cadastro.html">Cadastrar</a></li>
            </ul>
        </div>     
    </nav>

    <!-- Seção de Login -->
    <div class="login-section">
        <h2>Login</h2>
        <form id="login-form" action="http://localhost/TMS0256/app/backend/login" method="post">
            <div class="mb-3">
                <label for="login" class="form-label">Login:</label>
                <input type="login" class="form-control" id="login" name="login" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha:</label>
                <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-dark btn-primary mt-3">Login</button>
            <div class="forgot-password mt-3">
                <a href="#" id="forgot-password-link">Esqueci minha senha</a>
            </div>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>