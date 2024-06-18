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

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        button {
            padding: 8px 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .add-btn {
            display: block;
            width: 100%;
            margin-top: 20px;
            background-color: #28a745;
            color: #fff;
        }

        .add-btn:hover {
            background-color: #218838;
        }

        .edit-btn {
            background-color: #007bff;
            color: #fff;
        }

        .edit-btn:hover {
            background-color: #0056b3;
        }

        .delete-btn {
            background-color: #dc3545;
            color: #fff;
        }

        .delete-btn:hover {
            background-color: #c82333;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.4);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 400px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-top: 10px;
            color: #333;
        }

        input, select, button {
            margin-top: 5px;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        button {
            margin-top: 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
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
        Olá, <?= $_SESSION['usuario_login'] ; ?>!
        </span>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item fs-4" href="#">Minha conta</a></li>
          <li><a class="dropdown-item fs-4" href="#">Sair</a></li> 
        </ul>
      </div>
    </nav>

    <br>
    
    <!-- Modal -->
    
            <h2 id="modalTitle">Adicionar Quarto</h2>
            <form id="roomForm" method="POST" action="http://localhost/TMS0256/app/backend/quarto/novo">
                <label for="roomNumber">Número do Quarto:</label>
                <input type="text" id="roomNumber" name="roomNumber" required>

                <label for="roomCapacity">Capacidade de Pessoas:</label>
                <input type="number" id="roomCapacity" name="roomCapacity" required>

                <label for="roomCompany">Empresa:</label>
                <input type="text" id="roomCompany" name="roomCompany" required>

                <button type="submit">Salvar</button>
            </form>
        </div>
    </div>

    <!-- Script JavaScript
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('roomModal');
            const addRoomBtn = document.getElementById('addRoomBtn');
            const closeBtn = document.getElementsByClassName('close')[0];
            const roomForm = document.getElementById('roomForm');
            const roomTableBody = document.getElementById('roomTableBody');

            addRoomBtn.onclick = function() {
                modal.style.display = 'block';
                document.getElementById('modalTitle').textContent = 'Adicionar Quarto';
                roomForm.reset();
            }

            closeBtn.onclick = function() {
                modal.style.display = 'none';
            }

            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = 'none';
                }
            }

            roomForm.onsubmit = function(event) {
                event.preventDefault();
                const roomNumber = document.getElementById('roomNumber').value;
                const roomCapacity = document.getElementById('roomCapacity').value;
                const roomCompany = document.getElementById('roomCompany').value;

                // Criar uma nova linha na tabela com os dados do quarto
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td>${roomNumber}</td>
                    <td>${roomCapacity}</td>
                    <td>${roomCompany}</td>
                    <td>
                        <button class="edit-btn">Editar</button>
                        <button class="delete-btn">Excluir</button>
                    </td>
                `;
                roomTableBody.appendChild(newRow);

                modal.style.display = 'none';
            }

            // Adicionar funcionalidade de edição e exclusão de quartos
            roomTableBody.addEventListener('click', function(event) {
                const target = event.target;
                if (target.classList.contains('edit-btn')) {
                    const row = target.closest('tr');
                    const cells = row.querySelectorAll('td');

                    // Preencher o formulário de edição com os dados do quarto
                    document.getElementById('roomNumber').value = cells[0].textContent;
                    document.getElementById('roomCapacity').value = cells[1].textContent;
                    document.getElementById('roomCompany').value = cells[2].textContent;

                    // Alterar o título do modal para refletir a ação de edição
                    document.getElementById('modalTitle').textContent = 'Editar Quarto';

                    modal.style.display = 'block';
                } else if (target.classList.contains('delete-btn')) {
                    const row = target.closest('tr');
                    row.remove();
                }
            });
        });
    </script> -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>

