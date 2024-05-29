<?php 
    include_once("conexao.php");
 

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome=$_POST['name'];
        $login=$_POST['email'];
        $senha=$_POST['password'];
        $funcao=$_POST['funcao'];  
      



    
    $dupesql = "SELECT * FROM empregados where (login = '$email')";

    $duperaw = mysqli_query($connect, $dupesql);

    
    if(mysqli_num_rows($duperaw) > 0){

        echo "seu email já foi registrado";

    }else{

        $sql="INSERT INTO empregados(nome , login, senha, funcao)
        VALUES ('$nome', '$login', '$senha', '$funcao')";


    if(mysqli_query($connect, $sql)){
     
        header("location: crm_funcionario.php");
       
    }else{
        echo "Erro".mysqli_connect_error($connect);
    }
    }
    mysqli_close($connect);
    }


?>