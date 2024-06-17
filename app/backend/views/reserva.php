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
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Reserva</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Criar Reserva</h1>
        <form method="POST" action="http://localhost/TMS0256/app/backend/reserva/novo">
            <div class="mb-3">
                <label for="check_in" class="form-label">Check In</label>
                <input type="date" class="form-control" id="check_in" name="check_in" required>
            </div>
            <div class="mb-3">
                <label for="check_out" class="form-label">Check Out</label>
                <input type="date" class="form-control" id="check_out" name="check_out" required>
            </div>
            <div class="mb-3">
                <label for="valor_Pagamento" class="form-label">Valor Pagamento</label>
                <input type="number" class="form-control" id="valor_Pagamento" name="valor_Pagamento" required>
            </div>
            <div class="mb-3">
                <label for="quarto" class="form-label">Quarto</label>
                <input type="number" class="form-control" id="quarto" name="quarto" required>
            </div>
                <label for="qtd_Pessoas" class="form-label">Quantidade de Pessoas</label>
                <input type="number" class="form-control" id="qtd_Pessoas" name="qtd_Pessoas" required>
            </div>
            <button type="submit" class="btn btn-primary">Criar Reserva</button>
        </form>
    </div>
</body>
</html>
