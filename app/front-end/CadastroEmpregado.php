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


                /* Todos os elementos da página */
      * {
            margin: 0;
            padding: 0;
        }


        /* Elementos de tag <fieldset>*/
        fieldset {
            border: 0;
        }


        /* Elementos de tags <body>, <input>, <Select> e <button> */
        input, select, button {
            font-family: sans-serif;
            font-size: 1em;
            color: #070707;
            border-radius: 5px;
        }

        /* Elementos de classe "grupo" nos estados das pseudoclasses "before" e "after" */
        .grupo:before, .grupo:after {
            display: table;
        }

        /* Elementos de classe "grupo" no estado da pseudoclasse "after" */
        .grupo:after {
            clear: both;
        }

        /* Elementos de classe "campo" */
        .campo {
            margin-bottom: 1em;
        }

        /* Elementos de classe "campo" de tag <label> */
        .campo label {
            margin-bottom: 0.2em;
            color: #070707;
            display: block;
        }

        /* Elementos de classe "campo" ou "grupo" de tag <fieldset> */
        fieldset.grupo .campo {
            float:  left;
            margin-right: 1em;
        }

        /* Elementos de classe "campo" das tags <input> com atributo text e email e da tag <select>*/
        .campo input[type="text"], .campo input[type="email"], .campo input[type="telefone"],.campo input[type="login"],.campo input[type="password"],.campo input[type="cpf"],.campo select {
            padding: 0.2em;
            border: 1px solid #070707;
            box-shadow: 2px 2px 2px rgba(0,0,0,0.2);
            display: block;
        }

        
        .campo select option {
            padding-right: 1em;
        }

  

        /* Elemento de classe "botao" */
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

        /* Elemento de classe "botao" com o estado da pseudoclasse "hover" */
        .botao:hover {
            background: #8a8989;
            box-shadow: inset 2px 2px 2px rgba(0,0,0,0.2);
            text-shadow: none;
        }

        /* Elementos de classe botão e de tag <select> */
        .botao, select{
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
        <a class="nav-link active p-3" aria-current="page" href="home.html">CRM4SH.com</a>          
        <a class="nav-link active p-3" aria-current="page" href="home.html#informacoes">Informações</a>        
        <a class="nav-link active p-3" href="home.html#servicos">Serviços</a>
        <a class="nav-link active p-3" href="imoveisFiltro.html">Imóveis Disponíveis</a>                      

        <div class="btn-group" role="group">
            <button type="button" class="btn btn-dark dropdown-toggle fs-4" data-bs-toggle="dropdown" aria-expanded="false">
            Olá, <?= $_SESSION['usuario_login'] ? $_SESSION['usuario_login'] : 'Funcionario'; ?>!
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item fs-4" href="Login.php">Acessar</a></li>
              <li><a class="dropdown-item fs-4" href="cadastro.php">Cadastrar</a></li>
            </ul>
        </div>     
    </nav>


    <!-- Cadastro de funcionario-->
    <div class="tela_cadastro">
      <form action="http://localhost/TMS0256/app/backend/funcionario/novo" method="post">
        <fieldset class="grupo">
            <!-- Campo do nome -->
            <div class="campo">
                <label for="nome"><strong>Nome</strong></label>
                <input type="text" name="nome" id="nome" placeholder="Nome" required>
            </div>

            <div class="campo">
            <label><strong>Função</strong></label>
            <select id="empresa" name="fkFuncaoEmpregado">             
                        <option value="1">Recepcionista</option>
                        <option value="2">Gerente</option>    
            </select>
    
        </div>
            
        </fieldset>
        
        <fieldset class="grupo">
            <div class="campo">
                <label for="usuario"><strong>Nome de usuário</strong></label>
                <input type="usuario" name="usuario" id="usuario" placeholder="Informe o usuario" required>
            </div>
            <div class="campo">
                <label for="senha"><strong>Insira sua senha</strong></label>
                <input type="password" name="senha" id="senha" placeholder="Informe sua senha" required>
            </div>
          </fieldset>

          <div class="campo">
                <label for="senha"><strong>Insira ID Empresa</strong></label>
                <input type="text" name="fkEmpresa" id="fkEmpresa" placeholder="Informe id de sua empresa" required>

        <!-- Botão para conclusão do cadastro / Ao cadastrar o sistema gera a senha automaticamente-->
        <button class="botao" type="submit" onsubmit="">Cadastrar</button>            
    </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>