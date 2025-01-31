<?php
    include_once 'config/database.php';

    class Categoria{
        private $pdo;

        public function __construct($pdo){
            $this->pdo = $pdo; 
        }

        public function ListarCategorias(){
            $sql = "SELECT * FROM categorias";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function ListarCategoria($id){
            $sql = "SELECT FROM categorias WHERE id_categoria = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public function CriarUsuario($name, $desc){
            $sql = "INSERT INTO categorias (nome_categoria,descricao, categoria) VALUES ($name, $desc)";
            $stmt = $this->pdo->prepare($sql);
            $stmt ->bindParam('nome', $name);
            $stmt->bindParam(':desc', $desc);
            return $stmt->execute();
        }
    }

?>