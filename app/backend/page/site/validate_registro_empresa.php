<?php 
    
    include_once "conexao.php";
    include_once "cadastro_empresa.php";
    

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome=$_POST['nome'];
        $categoria=$_POST['categoria'];
        $email=$_POST['email'];
        $telefone=$_POST['telefone']; 
        $endereco=$_POST['endereco'];
        $estado=$_POST['estado'];


    $dupesql = "SELECT * FROM empresa where (email = '$email')";

    $duperaw = mysqli_query($connect, $dupesql);


    if(mysqli_num_rows($duperaw) > 0){

        echo "seu email já foi registrado";

    }else{

        $sql="INSERT INTO empresa(nome, categoria, email, telefone, endereco, estado) 
        VALUES ('$nome', '$categoria', '$email', '$telefone', '$endereco', '$estado' )";

    if(mysqli_query($connect, $sql)){
     
        header("location: crm_funcionario.php");
       
    }else{
        echo "Erro".mysqli_connect_error($connect);
    }
}
    mysqli_close($connect);
    
}
?>