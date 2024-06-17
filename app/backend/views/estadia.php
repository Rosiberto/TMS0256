
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Cadastro de estadia</h1>
        <form action="http://localhost/TMS0256/app/backend/estadia/novo" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Data de entrada</label>
                <input type="date" class="form-control" id="nome" name="Dt_Entrada" required>
            </div>
            <div class="mb-3">
                <label for="nome" class="form-label">Data de saida</label>
                <input type="date" class="form-control" id="nome" name="Dt_Saida" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Serviço</label>
                <input type="text" class="form-control" id="telefone" name="servico" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">empregado</label>
                <input type="text" class="form-control" id="telefone" name="fk_Empregado_ID" required>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>

