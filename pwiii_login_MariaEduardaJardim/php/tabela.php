<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
<style>
    .fundo{
        background: #f0f0f0;
    }
</style>

</head>

<body class="container fundo">
    
</body>
</html>

<?php
require '../php.Usuario.class.php';
$usuario = new Usuario();
$con = $usuario->conecta();

if (!$con){
    echo "Banco indisponível. Tente mais tarde!";
    exit();
} else {
    echo "<a href = '../html/cadastroUsuario.html' class = 'btn btn-sucess my-5'> Novo Usuário</a></p>";

    $usuarios = $usuario->listarUsuarios();

    //montagem do html da tabela

    $table = '<table class = "table table-striped">';
    $table .= '<thead>';
    $table .= '<tr>';
    $table .= '<th>Selecionar Usuários</th>';
    $table .= '<th>Codigo</th>';
    $table .= '<th>Nome</th>';
    $table .= '<th>Email</th>';
    $table .= '<th>Ações</th>';
    $table .= '<tr>';
    $table .= '<tbody>';


    //laço de repetição para inclusão dos dados na tabela

    foreach ($usuarios as $item){
        $id = $item['id'];
        $nome = ['nome'];
        $email = ['email'];

        $table .= '<tr>';
        $table .= "<td><input type = 'checkbox' value = $id></td>";
        $table .= "<td>$id</td>";
        $table .= "<td>$nome</td>";
        $table .= "<td>$email</td>";
        $table .= "<td><a class = 'btn btn-info' href = 'editar.php?codigo=$id'>Editar</a></td>";
        $table .= "<td><a class = 'btn btn-danger' href = 'deletar.php?id=$id'>Excluir</a><td>";

        $table .= '</tr>';
    }

    $table .= '</tbody>';
    $table .= '</thead>';
    $table .= '</table>';
}

echo $table;
?>