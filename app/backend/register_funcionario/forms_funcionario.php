
    <?php 
        include_once("cadastro_funcionario.php");
    
    ?>
    

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario teste funcionario</title>
</head>
<body>
<fieldset>Registro Funcionario
    <br>
        <form action="cadastro_funcionario.php" method="post" class="forms-funcionario">
            <label for="">Nome:</label>
            <input type="text" name="nome-funcionario" required>
            <br>
            <label for="">login:</label>
            <input type="text" name="login-funcionario" required>
            <br>
            <label for="">Senha:</label>
            <input type="password" name="senha-funcionario" required>
            <br>
            <label for="">Função:</label>
            <input type="text" name="funcao-funcionario" required>

            <input type="submit" name="enviar" value="cadastrar">
        </form>
    </fieldset>
</body>
</html>