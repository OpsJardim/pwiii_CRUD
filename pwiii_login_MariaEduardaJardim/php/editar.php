<?php
require "Usuario.class.php";

$usuario = new Usuario();

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $user = $usuario->localizarUsuario($id);

    if (empty($user)) {
        echo "Usuário não encontrado.";
        exit();
    }

} else {
    echo "ID não informado. Impossível editar o usuário.";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Alteração de Registro</title>
</head>
<body>

    <h2>Editar Usuário</h2>

    <form method="POST" action="editar_submit.php">

        <input type="hidden" name="id" value="<?php echo $user['id']; ?>">

        <label>Nome:</label><br>
        <input type="text" name="nome" value="<?php echo $user['nome']; ?>"><br><br>

        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $user['email']; ?>"><br><br>

        <label>Senha:</label><br>
        <input type="password" name="senha" value="<?php echo $user['senha']; ?>"><br><br>

        <input type="submit" value="Salvar Alterações">

    </form>

</body>
</html>