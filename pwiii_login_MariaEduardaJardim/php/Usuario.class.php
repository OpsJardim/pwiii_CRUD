<?php

class Usuario {

    private $id;
    private $email;
    private $nome;
    private $senha;
    private $pdo;

    public function __construct() {
        $this->conecta();
    }

    private function conecta() {

        $dns = "mysql:dbname=etimusuario;host=localhost";
        $userName = "root";
        $userPass = "";

        try {

            $this->pdo = new PDO($dns, $userName, $userPass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return true;

        } catch (PDOException $e) {

            echo "Erro de conexão: " . $e->getMessage();
            return false;
        }
    }

    public function inserirUsuario($nome, $email, $senha) {

        $sql = "INSERT INTO usuario SET nome = :n, email = :e, senha = :s";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);

        return $stmt->execute();
    }

    public function checkUser($email) {

        $sql = "SELECT * FROM usuario WHERE email = :e";

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(":e", $email);
        $stmt->execute();

        return ($stmt->rowCount() > 0);
    }

    public function checkPass($email, $senha) {

        $sql = "SELECT * FROM usuario WHERE email = :e AND md5(senha) = :s";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", md5($senha));

        $stmt->execute();

        return ($stmt->rowCount() > 0);
    }

    public function listarUsuarios() {

        $sql = "SELECT * FROM usuario";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function alterarUsuario($id, $nome, $email, $senha) {

        $sql = "UPDATE usuario
                SET nome = :n,
                    email = :e,
                    senha = :s
                WHERE id = :i";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e", $email);
        $stmt->bindValue(":s", $senha);
        $stmt->bindValue(":i", $id);

        return $stmt->execute();
    }

    public function localizarUsuario($id) {

        $sql = "SELECT * FROM usuario WHERE id = :i";

        $stmt = $this->pdo->prepare($sql);

        $stmt->bindValue(":i", $id);

        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>