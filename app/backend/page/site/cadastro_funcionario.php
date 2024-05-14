<?php 
        include_once("validate_login_funcionario.php");
    
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
        <form action="validate_registro_funcionario.php" method="post" class="forms-funcionario">
            <label for="">Nome:</label>
            <input type="text" name="nome" required>
            <br>
            <label for="">login:</label>
            <input type="text" name="login" required>
            <br>
            <label for="">Senha:</label>
            <input type="password" name="senha" required>
            <br>
            <label for="">Função:</label>
            <input type="text" name="funcao" required>

            <input type="submit" name="enviar" value="cadastrar">
        </form>
    </fieldset>
</body>
</html>