<?php
session_start();

require 'Usuario.class.php';
$usuario = new Usuario();

if (isset($_POST['nome'])) {
    //evita injection codigo malicioso digitado pelo usuario
    $nome   = addslaches($_POST['nome']);
    $email  = addslashes($_POST['email']);
    $senha  = addslashes($_POST['senha']);

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