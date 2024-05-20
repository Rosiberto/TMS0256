<!--confirmação cadastro-->
<?php

session_start();
print_r($_SESSION);


if((isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)){


    unset($_SESSION['email']);
    unset($_SESSION['password']);

    header("location: cadastro_funcionario.php");


}

    $logado = $_SESSION['email'];

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Hotelaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .center-vertical {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        height: 90vh;
      }
    </style>
</head>
  <body>
    <!-- Barra de Navegação (Header)-->
    <nav class="navbar d-flex justify-content-evenly border fs-3">
      <a class="nav-link active p-3" href="#">CRM4SH.com</a>          
      <a class="nav-link active p-3" href="#informacoes">Informações</a>        
      <a class="nav-link active p-3" href="#servicos">Serviços</a>
      <a class="nav-link active p-3" href="imoveisFiltro.html">Imóveis Disponíveis</a>                      

      <div class="btn-group" role="group">
        <span class="btn btn-dark dropdown-toggle fs-4" data-bs-toggle="dropdown" aria-expanded="false">
          Olá, Gestor!
        </span>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item fs-4" href="#">Minha conta</a></li>
          <li><a class="dropdown-item fs-4" href="logout.php">Sair</a></li> 
        </ul>
      </div>
    </nav>

    <!-- Botões no meio da tela -->
    <div class="center-vertical" style="margin-top: -50px;">         
      <h1 class="m-4">Configuração</h1>
      <div>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Dados da Empresa</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Atualizar Serviços</a>
        <a class="btn btn-primary btn-lg fs-3" href="cadastro_funcionario.php" role="button">Cadastro de Empregado</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Admministrar Quartos</a>
      </div>

      <h1 class="m-4">Registro de Clientes</h1>
      <div>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Cadastro de Clientes</a>
        <a class="btn btn-primary btn-lg fs-3" href="consultar_cliente.php" role="button">Consultar Clientes</a>
      </div>

      <h1 class="m-4">Reservas</h1>
      <div>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Registrar Reserva</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Atualizar Reserva</a>
      </div>

      <h1 class="m-4">Estadias</h1>
      <div>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Check-in</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Check-out</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Atualizar Estadia</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Atualizar Quarto</a>
        <a class="btn btn-primary btn-lg fs-3" href="#" role="button">Estatistica</a>
      </div>
      
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>