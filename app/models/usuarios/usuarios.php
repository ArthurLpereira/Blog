<?php

require_once  'config/database.php';

class Usuario{
    private $pdo;

    public function __construct($pdo){
        $this->pdo = $pdo;
    }

    public function ListarUsuarios(){
        $sql = "SELECT * FROM usuarios";
        $stmt = $this->pdo->prepare($sql); //stmt representa um objeto da classe PDOStatement, que é usado para preparar, executar e manipular consultas SQL no banco de dados.
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function ListarUsuario($id){
        $sql = "SELECT * FROM usuarios WHERE id_usuario = :id";
        $stmt = $this->pdo->prepared($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function CriarUsuario($user,$senha){
        $sql = "INSERT INTO usuarios (user_usuario, senha_usuario) VALUES (:user, :senha)";
        $stmt = $this->pdo->prepared($sql);
        $stmt->bindParam(':username', $user);
        $stmt->bindParam(':senha', password_hash($senha, PASSWORD_DEFAULT));
        return $stmt->execute();
    }

    public function ExcluirUsuario($id){
        $sql = "DELETE FROM usuarios WHERE id_usuario = :id";
        $stmt = $this->pdo->prepared($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}

?>