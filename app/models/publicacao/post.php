<?php
    include 'config/database.php';

    class Post{
        private $pdo;

        public function __construct($pdo)
        {
            $this->pdo = $pdo;
        }


        public function CriarPost($titulo,$foto,$descricao,$data,$usuarios_id_usuario,$categorias_id_categoria){
            try{
                $sqlUser = "SELECT id_usuario FROM usuarios WHERE id_usuario = :usuario_id";
                $stmtUser = $this->pdo->prepare($sqlUser);
                $stmtUser->bindParam(':usuario_id', $usuario_id, PDO::PARAM_INT);
                $stmtUser->execute();


                $sqlCategoria = "SELECT id_categoria FROM categorias WHERE id_categoria = :categoria_id";
                $stmtCategoria = $this->pdo->prepare($sqlCategoria);
                $stmtCategoria->bindParam(':categoria_id', $categoria_id, PDO::PARAM_INT);
                $stmtCategoria->execute();


                if($stmtUser->rowCount() == 0 || $stmtCategoria->rowCount() == 0){
                    return "Erro: Não existe usuarios ou categorias";
                }

     
                $sql = "INSERT INTO posts (titulo_post, foto_post,)";
                // terminar
            }
        }
    }

?>