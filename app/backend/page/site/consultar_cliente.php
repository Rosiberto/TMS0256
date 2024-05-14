<?php 

if((isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)){


    unset($_SESSION['email']);
    unset($_SESSION['password']);

    header("location: login_funcionario.php");
}
    include_once("conexao.php");

    $sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";

    $result = $connect->query($sql); 

    print_r($result);


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th scope="col">NOME</th>
                <th scope="col">EMAIL</th>
                <th scope="col">TELEFONE</th>
                <th scope="col">NACIONALIDADE</th>
                <th scope="col">DT_NASCIMENTO</th>
                <th scope="col">MORADA</th>
                <th scope="col">DOCUMENTO</th>
           
            
            </tr>
        </thead>
    </table>

    <?php 
    while($user_data = mysqli_fetch_assoc($result)){
        echo "<tr>";
        echo "<td>" . $user_data['nome'] . "</td>";
        echo "<td>" . $user_data['email'] . "</td>";
        echo "<td>" . $user_data['telefone'] . "</td>";
        echo "<td>" . $user_data['nacionalidade'] . "</td>";
        echo "<td>" . $user_data['dt_nascimento'] . "</td>";
        echo "<td>" . $user_data['morada'] . "</td>";
        echo "<td>" . $user_data['documento'] . "</td>";
        echo "<td>" . "ações" . "</td>";
        echo "</tr>";
    }
    ?>
</body>
</html>