

<!DOCTYPE html>
<html>
<head>
    <title>Criar Funcionário</title>
</head>
<body>
    <h2>Criar Funcionário</h2>
    <form method="POST" action="http://localhost/TMS0256/app/backend/funcionario/novo">
        <label for="nomeUsuario">Nome de Usuário:</label><br>
        <input type="text" id="nomeUsuario" name="nomeUsuario"><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="senha" name="senha"><br>
        <label for="nome">Nome:</label><br>
        <input type="text" id="nome" name="nome"><br>
        <label for="fkEmpresa">ID da Empresa:</label><br>
        <select id="fkEmpresa" name="fkEmpresa">
            <?php foreach ($empresas as $empresa): ?>
                <option value="<?= $empresa['ID'] ?>"><?= $empresa['Nome'] ?></option>
            <?php endforeach; ?>
        </select><br>
        <label for="fkFuncaoEmpregado">Função do Empregado:</label><br>
        <select id="fkFuncaoEmpregado" name="fkFuncaoEmpregado">
            <?php foreach ($funcoesEmpregado as $funcao): ?>
                <option value="<?= $funcao['ID'] ?>"><?= $funcao['Nome_Funcao'] ?></option>
            <?php endforeach; ?>
        </select><br><br>
        <input type="submit" value="Criar">
    </form>
</body>
</html>
