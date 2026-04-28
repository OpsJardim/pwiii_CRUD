<?php
require 'Usuario.class.php';
$usuario = new Usuario();

$conn = $usuario -> conecta();

if($con){
    $user = $usuario->listarUsuarios();
    if(empty($user)){
        echo "Não há usuários para listar!";
    } else {
        foreach($user as $item){
            $id = $item['id'];
            $nome = $item['nome'];

            echo "Codigo $id - Nome $nome<br>";
        }
    }else 
    echo "Banco indisponível. Tente mais tarde!"
}