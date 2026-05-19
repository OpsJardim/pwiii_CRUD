<?php
 require "Usuario.class.php";
 $usuario = new Usuario();

 if(isset($_GET['id'])){
    $id = $_GET['id'];
 }else{
    echo "id NÃO INFORMADO. Impossívfel editar o usuário.";
    exit();
 }
 ?>

 <!DOCTYPE html>
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alteração de Registro</title>
 </head>
 <body>
     <h2>Tela de Cadastro</h2>
        <form  method = "POST" action="../php/editar_submit.php">
            <input type="text" placeholder= "Digite o seu nome" name="nome">
            <input type="text" placeholder = "Digite o email" name = "email"><p>
            <input type="password" placeholder = "Digite a senha" name = "senha"><p>
            <input type="submit" value = "Cadastrar">
        </form>
 </body>
 </html>