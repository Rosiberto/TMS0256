<?php 
    include_once("../conexao/conexao.php");
    include_once "forms_cliente.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome=$_POST['nome-cliente'];
        $email=$_POST['email-cliente'];
        $endereco=$_POST['endereco-cliente'];
        $telefone=$_POST['telefone-cliente']; 
        $data_nascimento=$_POST['data-de-nascimento-cliente'];
        $nacionalidade=$_POST['nacionalidade-cliente'];
        $passaporte=$_POST['passaporte-cliente']; 
        $identidade=$_POST['identidade-cliente'];


    $sql="INSERT INTO cliente(nome, email, endereco, telefone, data_nascimento, nacionalidade, passaporte, identidade)
            VALUES ('$nome', '$email', '$endereco', '$telefone', '$data_nascimento', '$nacionalidade', '$passaporte', '$identidade')";

    if(mysqli_query($connect, $sql)){
        echo "Usuario cadastrado com sucesso";
    }else{
        echo "Erro".mysqli_connect_error($connect);
    }
    mysqli_close($connect);
    
}
?>