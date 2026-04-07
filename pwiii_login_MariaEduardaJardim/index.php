    <?php
    require 'Usuario.class.php';
    $usuario = new Usuario();

    $conn = $usuario->conecta();

    if ($conn){
        ?>
        <h2>Tela de Login</h2>
        <form  method = "POST" action="login.php">
            <input type="text" placeholder = "Digite o email" name = "email"><p>
            <input type="password" placeholder = "Digite a senha" name = "senha"><p>
            <input type="submit" value = "Cadastrar">
        </form>
        
        <?php        
    } else{
        echo "<h1> Erro ao conectar ao banco r</h1>";
    }