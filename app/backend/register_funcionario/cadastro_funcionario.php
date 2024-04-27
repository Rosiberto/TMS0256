<?php 
    include_once("../conexao/conexao.php");
    include_once "forms_funcionario.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome=$_POST['nome-funcionario'];
        $login=$_POST['login-funcionario'];
        $senha= md5($_POST['senha-funcionario']);
        $funcao=$_POST['funcao-funcionario']; 
      



    $sql="INSERT INTO funcionario(nome, loginF, senha, funcao)
            VALUES ('$nome', '$login', '$senha', '$funcao')";

    if(mysqli_query($connect, $sql)){
        echo "Funcionário cadastrado com sucesso";
    }else{
        echo "Erro".mysqli_connect_error($connect);
    }
    mysqli_close($connect);
    
}
?>