<?php

require_once "DB/conn.php";

class diabetesDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function cadastrarDiabetes($diabetesDTO){
        try{
            $sql = "INSERT INTO diabetes(id_usuario,tipo_diabetes,terapia,data_diagnostico,meta_max,meta_min)
                    VALUES(?,?,?,?,?,?)";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$diabetesDTO->getId_usuario());
            $stmt->bindValue(2,$diabetesDTO->getTipo_diabetes());
            $stmt->bindValue(3,$diabetesDTO->getTerapia());
            $stmt->bindValue(4,$diabetesDTO->getData_diagnostico());
            $stmt->bindValue(5,$diabetesDTO->getMeta_max());
            $stmt->bindValue(6,$diabetesDTO->getMeta_min());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>