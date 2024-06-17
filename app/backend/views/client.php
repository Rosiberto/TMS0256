<<<<<<< HEAD
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
        <h1>Cadastro de Cliente</h1>
        <form action="" method="post">
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="text" class="form-control" id="telefone" name="telefone" required>
            </div>
            <div class="mb-3">
                <label for="morada" class="form-label">Morada</label>
                <input type="text" class="form-control" id="morada" name="morada" required>
            </div>
            <div class="mb-3">
                <label for="CPF" class="form-label">CPF</label>
                <input type="text" class="form-control" id="cpf" name="cpf" required>
            </div>
            <div class="mb-3">
                <label for="nacionalidade" class="form-label">Nacionalidade</label>
                <input type="text" class="form-control" id="nacionalidade" name="nacionalidade" required>
            </div>
            <div class="mb-3">
                <label for="dataNascimento" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="dataNascimento" name="dataNascimento" required>
            </div>
            <div class="mb-3">
                <label for="fkEmpresaID" class="form-label">Empresa</label>
                <select class="form-control" id="fkEmpresaID" name="fkEmpresaID" required>
                    <?php if (!empty($empresas)): ?>
                        <?php foreach ($empresas as $empresa): ?>
                            <option value="<?php echo $empresa['ID']; ?>"><?php echo $empresa['Nome']; ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">Nenhuma empresa disponível</option>
                    <?php endif; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
=======
>>>>>>> 0f905c58fbca3c9bbc4cfcc19b73814eb6c3d12a
