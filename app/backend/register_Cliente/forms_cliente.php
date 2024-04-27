<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forumlário teste cliente</title>
</head>
<body>
<fieldset>Registro cliente
    <br>
        <form action="cadastro_cliente.php" method="post" class="forms-cliente">
            <label for="">Nome:</label>
            <input type="text" name="nome-cliente" required>
            <br>
            <label for="">Email:</label>
            <input type="email" name="email-cliente" required>
            <br>
            <label for="">Endereço:</label>
            <input type="text" name="endereco-cliente" required>
            <br>
            <label for="">Telefone:</label>
            <input type="text" name="telefone-cliente" required>
            <br>
            <label for="">Data de Nascimento:</label>
            <input type="date" name="data-de-nascimento-cliente" required>
            <br>
            <label for="">Nacionalidade:</label>
            <input type="text" name="nacionalidade-cliente" required>
            <br>
            <label for="">Passaporte:</label>
            <input type="text" name="passaporte-cliente" required>
            <br>
            <label for="">identidade:</label>
            <input type="text" name="identidade-cliente" required>
            <br>

            <input type="submit" name="enviar" value="cadastrar">
            
        </form>
    </fieldset>
    

</body>
</html>