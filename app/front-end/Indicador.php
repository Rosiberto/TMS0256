<?php

require_once '../backend/core/Auth.php';
requireAuth();

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM Hotelaria</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            color: #333;
        }

        .card {
            margin: 10px 0;
        }
    </style>
</head>
<body>
<nav class="navbar d-flex justify-content-evenly border fs-3">
      <a class="nav-link active p-3" href="#">CRM4SH.com</a>          
      <a class="nav-link active p-3" href="#informacoes">Informações</a>        
      <a class="nav-link active p-3" href="#servicos">Serviços</a>
      <a class="nav-link active p-3" href="imoveisFiltro.html">Imóveis Disponíveis</a>                      

      <div class="btn-group" role="group">
        <span class="btn btn-dark dropdown-toggle fs-4" data-bs-toggle="dropdown" aria-expanded="false">
        <?= "Olá, " . $_SESSION['usuario_tipo']; ?>
        </span>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item fs-4" href="http://localhost/TMS0256/app/backend/logout">Sair</a></li> 
        </ul>
      </div>
    </nav>

    <br>

    <div class="container mt-5">
        <h1 class="text-center">Indicadores de Quartos</h1>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Disponíveis</div>
                    <div class="card-body">
                        <h5 class="card-title" id="availableRooms">0</h5>
                        <p class="card-text">Quartos disponíveis.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Ocupados</div>
                    <div class="card-body">
                        <h5 class="card-title" id="occupiedRooms">0</h5>
                        <p class="card-text">Quartos ocupados.</p>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="location.href='administrar_quarto.html'" class="btn btn-primary">Voltar</button>
    </div>

    <script>
        // Função para atualizar os indicadores
        function updateIndicators() {
            // Recupera a tabela de quartos da página administrar_quarto.html
            const roomTableBody = window.opener.document.getElementById('roomTableBody');
            // Contadores para os diferentes estados dos quartos
            let availableCount = 0;
            let occupiedCount = 0;

            // Loop pelos quartos na tabela
            roomTableBody.querySelectorAll('tr').forEach(row => {
                // Obtém o status do quarto
                const status = row.cells[3].textContent.trim();

                // Incrementa os contadores apropriados
                switch (status) {
                    case 'Disponível':
                        availableCount++;
                        break;
                    case 'Ocupado':
                        occupiedCount++;
                        break;
                }
            });

            // Atualiza os elementos HTML com os novos valores
            document.getElementById('availableRooms').textContent = availableCount;
            document.getElementById('occupiedRooms').textContent = occupiedCount;
        }

        // Chama a função de atualização dos indicadores ao carregar a página
        window.addEventListener('DOMContentLoaded', updateIndicators);
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>