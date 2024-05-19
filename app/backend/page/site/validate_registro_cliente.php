<?php 
    include_once("conexao.php");
    include_once ("cadastro_cliente.php");

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome=$_POST['nome'];
        $sobre_nome=$_POST['sobrenome'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone']; 
        $cpf=$_POST['cpf'];
        $sexo=$_POST['sexo'];
        $estado=$_POST['estado'];
        $senha=$_POST['senha'];
      

        $nome_final ='$nome ' . '$sobre_nome';

        $dupesql = "SELECT * FROM cliente where (email = '$email') OR (documento = '$cpf')'";

        $duperaw = mysqli_query($connect, $dupesql);


    if(mysqli_num_rows($duperaw) > 0){

     echo "O seu usuário já está cadastrado";

     }else{

        $sql="INSERT INTO cliente (nome, email, telefone, documento, sexo, nacionalidade, senha)
        VALUES ('$nome_final', '$email', '$telefone', '$cpf', '$sexo', '$estado', '$senha')";

    if(mysqli_query($connect, $sql)){
  
      echo "conta criada com sucesso";
    
    }else{

        echo "Erro".mysqli_connect_error($connect);

    }
    
    }
    mysqli_close($connect);
    
}
?>