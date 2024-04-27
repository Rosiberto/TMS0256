
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forumlário teste empresa</title>
</head>
<body>
<fieldset>Registro Empresa
    <br>
        <form action="cadastro_empresa.php" method="post" class="forms-empresa">
            <label for="">Nome:</label>
            <input type="text" name="nome-empresa" required>
            <br>
            <label for="">Email:</label>
            <input type="email" name="email-empresa" required>
            <br>
            <label for="">Endereço:</label>
            <input type="text" name="endereco-empresa" required>
            <br>
            <label for="">Telefone:</label>
            <input type="text" name="telefone-empresa" required>
            <br>
            <label for="">Categoria:</label>
            <input type="text" name="categoria-empresa" required>

            <input type="submit" name="enviar" value="cadastrar">
        </form>
    </fieldset>
    
<?php 


include_once "cadastro_empresa.php";

    

?>
</body>
</html>