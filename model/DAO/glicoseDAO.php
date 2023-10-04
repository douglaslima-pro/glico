<?php

require_once "DB/conexãoBD.php";

class glicoseDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function registrarGlicose($glicoseDTO){
        try{
            $sql = "INSERT INTO glicose(id_usuario,valor,data,hora,condicao,comentario) VALUES(?,?,?,?,?,?)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$glicoseDTO->getId_usuario());
            $stmt->bindValue(2,$glicoseDTO->getValor());
            $stmt->bindValue(3,$glicoseDTO->getData());
            $stmt->bindValue(4,$glicoseDTO->getHora());
            $stmt->bindValue(5,$glicoseDTO->getCondicao());
            $stmt->bindValue(6,$glicoseDTO->getComentario());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>