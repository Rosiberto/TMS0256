<?php 

if((isset($_SESSION['email']) == true) and (!isset($_SESSION['password']) == true)){


    unset($_SESSION['email']);
    unset($_SESSION['password']);

    header("location: login_funcionario.php");
}
    include_once("conexao.php");

    $sql = "SELECT * FROM cliente ORDER BY id_cliente DESC";

    $result = $connect->query($sql); 

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultar Cliente</title>
</head>
<body>
<style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
    <table class="table-bg">
        <thead>
            <tr>
                <th scope="col">ID</th>
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
        echo "<td>" . $user_data['id_cliente'] . "</td>";
        echo "<td>" . $user_data['nome'] . "</td>";
        echo "<td>" . $user_data['email'] . "</td>";
        echo "<td>" . $user_data['telefone'] . "</td>";
        echo "<td>" . $user_data['nacionalidade'] . "</td>";
        echo "<td>" . $user_data['dt_nascimento'] . "</td>";
        echo "<td>" . $user_data['morada'] . "</td>";
        echo "<td>" . $user_data['documento'] . "</td>";
        echo "<td>" . "<a href='editar_cliente.php?nome=$user_data[id_cliente]'>" . "editar" . "</a>"; "</td>";
        echo "</tr>"; 
    }
    ?>
</body> <a href=""></a>
</html>