<?php
session_start();
require "Usuario.class.php";
$usuario = new Usuario();

$conn = $usuario->conecta();


    if(isset($_POST['nome'])){
        $nome  = $_POST['nome'];    
        $email = $_POST['email'];
        $senha = $_POST['senha'];
   
    if($conn){
        $usuario->checkUser($email);
        if(!$usuario){
            $usuario->inserirUsuario($nome,$email,$senha);
            $_SESSION['nome']=$nome;
            header("Location:home.php");
            
        }else{
            echo "Usuario não cadastrado! vá para o login ";
            header("Location:cadastro.php");
            
        }
    }else{
        echo"Banco indisponivel, tente mais tarde ";
    }
}else{
    echo "nao veio post";

}   

