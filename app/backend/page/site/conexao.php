<?php 

    session_start();

    $hostname = "localhost";
    $username = "root";
    $password = '';
    $dbname = "hotel";

    $connect= new mysqli("$hostname", "$username", "$password", "$dbname");


    if($connect->connect_errno){
        echo "Erro Banco de dados:{$connect->connect_errno}"; 
    exit();
    }else{
        echo "sem erros";
    }


?>
