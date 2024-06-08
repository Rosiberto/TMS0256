<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Quarto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Criar Quarto</h2>
        <form method="POST" action="http://localhost/TMS0256/app/backend/novo/novo">
            <div class="mb-3">
                <label for="Numero" class="form-label">Número</label>
                <input type="text" class="form-control" id="Numero" name="Numero" required>
            </div>
            <div class="mb-3">
                <label for="Capacidade_Pessoa" class="form-label">Capacidade de Pessoa</label>
                <input type="number" class="form-control" id="Capacidade_Pessoa" name="Capacidade_Pessoa" required>
            </div>
            <div class="mb-3">
                <label for="fk_Empresa_ID" class="form-label">Empresa</label>
                <select class="form-select" id="fk_Empresa_ID" name="fk_Empresa_ID" required>
                <?php if (isset($empresas) && !empty($empresas)): ?>
                <?php foreach ($empresas as $empresa): ?>
                    <option value="<?= $empresa['id'] ?>"><?= $empresa['Nome'] ?></option>
                <?php endforeach; ?>
            <?php else: ?>
                <option value="">Nenhuma empresa disponível</option>
            <?php endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
