<?php

require_once "DB/conn.php";

class recuperacaoDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function registrarRecuperacao($recuperacaoDTO){
        try{
            $sql = "INSERT INTO recuperacao(id_usuario,chave)
                    VALUES(NULLIF(?,''),NULLIF(?,''))";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$recuperacaoDTO->getId_usuario());
            $stmt->bindValue(2,$recuperacaoDTO->getChave());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisarRecuperacao($recuperacaoDTO){
        try{
            $sql = "SELECT * FROM recuperacao
                    WHERE id_usuario = ? AND chave = ?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$recuperacaoDTO->getId_usuario());
            $stmt->bindValue(2,$recuperacaoDTO->getChave());
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function excluirRecuperacao($id_usuario){
        try{
            $sql = "DELETE FROM recuperacao
                    WHERE id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(":id_usuario",$id_usuario);
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }
}

?>