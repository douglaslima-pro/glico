<?php

require_once "DB/conn.php";

class glicoseDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function registrarGlicose($glicoseDTO){
        try{
            $sql = "INSERT INTO glicose(id_usuario,valor,data,hora,condicao,comentario)
                    VALUES(?,?,?,?,?,NULLIF(?,''))";
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

    public function pesquisarUltimaGlicose($id_usuario){
        try{
            $sql = "SELECT valor FROM glicose
                    WHERE id_usuario = :id_usuario
                    ORDER BY data_registro DESC,hora_registro DESC LIMIT 1";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function pesquisarGlicoses($id_usuario,$limite,$inicio){
        try{
            $sql = "SELECT id_glicose,valor,DATE_FORMAT(data,'%d/%m/%Y') AS data,TIME_FORMAT(hora,'%H:%i') AS hora,condicao,comentario,data_registro,hora_registro FROM glicose
                    WHERE id_usuario = :id_usuario
                    ORDER BY DATE(data) DESC, hora DESC, id_glicose DESC
                    LIMIT :limite OFFSET :inicio";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->bindParam(':limite',$limite,PDO::PARAM_INT);
            $stmt->bindParam(':inicio',$inicio,PDO::PARAM_INT);
            $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //RETORNA O NÚMERO TOTAL DE REGISTROS
    public function contarGlicoses($id_usuario){
        try{
            $sql = "SELECT COUNT(*) AS count FROM glicose
                    WHERE id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //RETORNA A MÉDIA DAS GLICOSES NO PERÍODO DE 30 DIAS
    public function mediaGlicoses($id_usuario){
        try{
            $sql = "SELECT ROUND(AVG(valor)) FROM glicose
                    WHERE id_usuario = :id_usuario AND data BETWEEN DATE_SUB(CURDATE(),INTERVAL 30 DAY) AND CURDATE()";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(':id_usuario',$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetchColumn();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function visualizarGlicose($id_glicose,$id_usuario){
        try{
            $sql = "SELECT * FROM glicose
                    WHERE id_glicose = :id_glicose AND id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_glicose",$id_glicose);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function editarGlicose($id_glicose,$id_usuario,$comentario){
        try{
            $sql = "UPDATE glicose SET comentario = :comentario
                    WHERE id_glicose = :id_glicose AND id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":comentario",$comentario);
            $stmt->bindParam(":id_glicose",$id_glicose);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function excluirGlicose($id_glicose,$id_usuario){
        try{
            $sql = "DELETE FROM glicose
                    WHERE id_glicose = :id_glicose AND id_usuario = :id_usuario";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_glicose",$id_glicose);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //calcula a porcentagem de hipoglicemias dos últimos 30 dias
    public function calcularHipoglicemias($id_usuario){
        try{
            $sql = "CALL usp_calcularHipoglicemias(:id_usuario)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetchColumn();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    //calcula a porcentagem de hiperglicemias dos últimos 30 dias
    public function calcularHiperglicemias($id_usuario){
        try{
            $sql = "CALL usp_calcularHiperglicemias(:id_usuario)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindParam(":id_usuario",$id_usuario);
            $stmt->execute();
            $retorno = $stmt->fetchColumn();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}
?>