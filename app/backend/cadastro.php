<?php 
    include("conexao.php");

    function
    $nome=$_POST['nome-empresa'];
    $email=$_POST['email-empresa'];
    $endereco=$_POST['endereco-empresa'];
    $telefone=$_POST['telefone-empresa']; 
    $categoria=$_POST['categoria-empresa'];



    $sql="INSERT INTO empresa(nome, email, endereco, telefone, categoria) 
            VALUES ('$nome', '$email', '$endereco', '$telefone', '$categoria')";

    if(mysqli_query($connect, $sql)){
        echo "Usuario cadastrado com sucesso";
    }else{
        echo "Erro".mysqli_connect_error($connect);
    }
    mysqli_close($connect);
?>