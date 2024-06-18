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

        /* Todos os elementos da página */
        * {
            margin: 0;
            padding: 0;
        }

        /* Elementos de tag <fieldset>*/
        fieldset {
            border: 0;
        }

        /* Elementos de tags <body>, <input>, <select> e <button> */
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
            float: left;
            margin-right: 1em;
        }

        /* Elementos de classe "campo" das tags <input> com atributo text e email e da tag <select>*/
        .campo input[type="text"], .campo input[type="email"], .campo input[type="telefone"], .campo input[type="login"], .campo input[type="password"], .campo input[type="cpf"], .campo select {
            padding: 0.2em;
            border: 1px solid #070707;
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
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
            box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.2);
            text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);
            left: 50%;
            margin-right: -50%;
        }

        /* Elemento de classe "botao" com o estado da pseudoclasse "hover" */
        .botao:hover {
            background: #8a8989;
            box-shadow: inset 2px 2px 2px rgba(0, 0, 0, 0.2);
            text-shadow: none;
        }

        /* Elementos de classe botão e de tag <select> */
        .botao, select {
            cursor: pointer;
        }

        .tela_cadastro {
            margin-top: 30px;
            padding: 20px;
            width: 75%;
            border: 1px solid #070707;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.171);
            text-align: center;
            align-self: center;
        }

        .titulo {
            font-size: 25px;
            margin-bottom: 10px;
        }

        .subtitulo {
            font-size: 18px;
            font-weight: bold;
            text-align: center;
            width: 100%;
            margin-bottom: 20px;
        }

        .hospede {
            font-size: 15px;
            font-weight: bold;
            text-align: left;
            width: 100%;
            margin-bottom: 30px;
        }

        /* Novo estilo para os títulos dos campos de data */
        .data-title {
            font-size: 15px;
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }

        .container {
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <div class="container">
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
                    <li><a class="dropdown-item fs-4" href="#">Sair</a></li>
                </ul>
            </div>
        </nav>

        <!-- Cadastro de cliente-->
        <div class="tela_cadastro" style="height: auto;">
            <h1 class="titulo"><strong>Atualizar Estadia</strong></h1>
            <h2 class="subtitulo">Gerenciar Hóspedes</h2>

            <!-- Hóspede 1 -->
            <h3 class="hospede">Hóspede 1</h3>
            <form>
                <fieldset class="grupo">
                    <!-- Campo do Nome -->
                    <div class="campo">
                        <label for="nome1"><strong>Nome</strong></label>
                        <input type="text" name="nome1" id="nome1" placeholder="Nome da empresa" required>
                    </div>

                    <!-- Campo de email -->
                    <div class="campo">
                        <label for="email1"><strong>Email</strong></label>
                        <input type="email" name="email1" id="email1" placeholder="email@exemplo.com" required>
                    </div>

                    <!-- Campo de telefone -->
                    <div class="campo">
                        <label for="telefone1"><strong>Telefone</strong></label>
                        <input type="telefone" name="telefone1" id="telefone1" placeholder="DDD + número" required>
                    </div>

                    <!-- Campo de documento -->
                    <div class="campo">
                        <label for="documento1"><strong>Documento</strong></label>
                        <input type="text" name="documento1" id="documento1" placeholder="Informe o Documento" required>
                    </div>
                </fieldset>
            </form>

            <!-- Hóspede 2 -->
            <h3 class="hospede">Hóspede 2</h3>
            <form>
                <fieldset class="grupo">
                    <!-- Campo do Nome -->
                    <div class="campo">
                        <label for="nome2"><strong>Nome</strong></label>
                        <input type="text" name="nome2" id="nome2" placeholder="Nome da empresa" required>
                    </div>

                    <!-- Campo de email -->
                    <div class="campo">
                        <label for="email2"><strong>Email</strong></label>
                        <input type="email" name="email2" id="email2" placeholder="email@exemplo.com" required>
                    </div>

                    <!-- Campo de telefone -->
                    <div class="campo">
                        <label for="telefone2"><strong>Telefone</strong></label>
                        <input type="telefone" name="telefone2" id="telefone2" placeholder="DDD + número" required>
                    </div>

                    <!-- Campo de documento -->
                    <div class="campo">
                        <label for="documento2"><strong>Documento</strong></label>
                        <input type="text" name="documento2" id="documento2" placeholder="Informe o Documento" required>
                    </div>
                </fieldset>
            </form>

            <!-- Botão Salvar -->
            <button class="btn custom-btn mt-3 mb-5">Salvar</button>

            <!-- Subtítulo Mudar datas -->
            <h2 class="subtitulo mt-5">Mudar datas</h2>

            <!-- Calendários -->
            <div class="row">
                <div class="col">
                    <label class="data-title">Check-in</label>
                    <input type="date" class="form-control">
                </div>
                <div class="col">
                    <label class="data-title">Check-out</label>
                    <input type="date" class="form-control">
                </div>
            </div>

            <!-- Botão Salvar abaixo dos calendários -->
            <button class="btn custom-btn mt-3 mb-5">Salvar</button>

            <!-- Subtítulo Cancelar reserva -->
            <h2 class="subtitulo mt-5">Cancelar reserva</h2>

            <!-- Botão Cancelar -->
            <button class="btn btn-danger mt-3 w-50 mx-auto d-block">Cancelar</button>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzOg6tv6tI6iBFbhpVHF4ANn6pR9NT1V8+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-5sAR7xN1vvhT1oDg+ZfFQx9JJxT6i/jp7aMGGEt3eVx5wj0IQuD7U6KE/0CZ23Q3" crossorigin="anonymous"></script>
    </div>
</body>
</html>