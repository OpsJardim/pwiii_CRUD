    <?php
    require 'Usuario.class.php';
    $usuario = new Usuario();

    $conn = $usuario->conecta();

    if ($conn){
        echo "<h1> Conectado ao banco!</h1>";
    } else{
        echo "<h1> Erro ao conectar ao banco</h1>";
    }