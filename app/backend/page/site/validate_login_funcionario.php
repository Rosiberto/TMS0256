<?php 


if(isset($_POST['submit']) && !empty($_POST['email'])&& !empty($_POST['password'])){
    include_once("conexao.php");

    $loginF = $_POST['email'];
    $senha = $_POST['password'];

     print_r("Login:" .  $loginF);
     print_r("Senha:" .  $senha);

    $sql = "SELECT * FROM empregados WHERE login = '$loginF' AND senha = '$senha'";

    $result = $connect->query($sql);

    print_r($result);

    if(mysqli_num_rows($result) < 1){

        unset($_SESSION['email']);
        unset($_SESSION['password']);
        echo "usuario ou senha não cadastrada";
    }else{
        $_SESSION['email'] = $loginF;
        $_SESSION['password'] = $senha;
        header("location: crm_funcionario.php");
    }

}else{
    header("location:login_funcionario.html");
 }

?>