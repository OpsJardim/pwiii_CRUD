<?php

require "Usuario.class.php";

$usuario = new Usuario();

$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

if ($usuario->alterarUsuario($id, $nome, $email, $senha)) {
    echo "Usuário alterado com sucesso!";
} else {
    echo "Erro ao alterar usuário.";
}