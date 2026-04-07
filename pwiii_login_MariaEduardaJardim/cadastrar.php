<?php
session_start();

require 'Usuario.class.php';
$usuario = new Usuario();

if (isset($_POST['nome'])) {
    $nome   = $_POST['nome'];
    $email  = $_POST['email'];
    $senha  = $_POST['senha'];

    $conn = $usuario->conecta();

    if($conn){
        $user = $usuario->checkUser($email);
        if (!$user) {
            $user = $usuario->inserirUsuario($nome, $email, $senha);
        }else{
            echo "Usuário já cadastrado. Vá para login.";
            exit();
        }
    }else{
        echo "Banco indisponível :(, tente mais tarde";
    }
} else{
    echo "Não veio o POST";
}

?>