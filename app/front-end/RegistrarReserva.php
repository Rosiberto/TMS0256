<?php

require_once '../backend/core/Auth.php';
requireAuth();


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
        .custom-btn {
            border-radius: 15px; 
            background-color: #8DBAC8; 
            font-weight: bold; 
            font-size: 25px; 
        }
        * {
            margin: 0;
            padding: 0;
        }
        fieldset {
            border: 0;
        }
        input, select, button {
            font-family: sans-serif;
            font-size: 1em;
            color: #070707;
            border-radius: 5px;
        }
        .grupo:before, .grupo:after {
            display: table;
        }
        .grupo:after {
            clear: both;
        }
        .campo {
            margin-bottom: 1em;
        }
        .campo label {
            margin-bottom: 0.2em;
            color: #070707;
            display: block;
        }
        fieldset.grupo .campo {
            float: left;
            margin-right: 1em;
        }
        .campo input[type="text"], .campo input[type="email"], .campo input[type="telefone"], .campo input[type="login"], .campo input[type="password"], .campo input[type="cpf"], .campo select {
            padding: 0.2em;
            border: 1px solid #070707;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            display: block;
        }
        .campo select option {
            padding-right: 1em;
        }
        .botao {
            font-size: 1.2em;
            background: #181818;
            border: 0;
            margin-bottom: 1em;
            color: #ffffff;
            padding: 0.2em 0.6em;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: 1px 1px 1px rgba(0,0,0,0.5);
            left: 50%;
            margin-right: -50%;
        }
        .botao:hover {
            background: #8a8989;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: none;
        }
        .botao, select {
            cursor: pointer;
        }
        .tela_cadastro {
            position: absolute;
            margin-top: 30px;
            padding: 20px;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            border: 1px solid #070707;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.171);
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
          Olá, <?= $_SESSION['usuario_login']; ?>!
        </span>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item fs-4" href="http://localhost/TMS0256/app/front-end/LoginCliente.php">Minha conta</a></li>
          <li><a class="dropdown-item fs-4" href="http://localhost/TMS0256/app/backend/logout">Sair</a></li> 
        </ul>
      </div>
    </nav>

    <div class="tela_cadastro">
        <form action="http://localhost/TMS0256/app/backend/reserva/novo" method="post">
            <fieldset class="grupo">
                <div class="campo">
                    <label for="Dt_Entrada"><strong>Data de Entrada</strong></label>
                    <input type="date" name="Dt_Entrada" id="Dt_Entrada" placeholder="25/05/2024" required>
                </div>
                <div class="campo">
                    <label for="Dt_Saida"><strong>Data de Saída</strong></label>
                    <input type="date" name="Dt_Saida" id="Dt_Saida" placeholder="30/05/2024" required>
                </div>
            </fieldset>
            <fieldset class="grupo">
                <div class="campo">
                    <label for="qtd_Pessoas"><strong>Quantidade de pessoas</strong></label>
                    <input type="text" name="qtd_Pessoas" id="qtd_Pessoas" placeholder="Quantidade de Pessoas" required>
                </div>
            </fieldset>
            <div class="form-group">
            <label for="servicos">Serviços</label>
            <select id="servicos" name="servico" required>
                <option value="cafe-da-manha">Café da Manhã</option>
                <option value="almoco">Almoço</option>
                <option value="jantar">Jantar</option>
                <option value="cafe-da-manha, almoco, jantar">Pacote Completo</option>
            </select>
            </fieldset>
            <button class="botao" type="submit">Efetuar Reserva</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
