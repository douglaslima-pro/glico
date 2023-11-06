<?php

require_once "DB/conn.php";

class diabetesDAO{

    private static $conn;

    public function __construct(){
        self::$conn = conexaoBD::criarConexao();
    }

    public function alterarDiabetes($diabetesDTO){
        try{
            $sql = "UPDATE diabetes
                    SET tipo_diabetes=NULLIF(?,''),terapia=NULLIF(?,''),data_diagnostico=NULLIF(?,''),meta_min=NULLIF(?,''),meta_max=NULLIF(?,'')
                    WHERE id_usuario=?";
            $stmt = self::$conn->prepare($sql);
            $stmt->bindValue(1,$diabetesDTO->getTipo_diabetes());
            $stmt->bindValue(2,$diabetesDTO->getTerapia());
            $stmt->bindValue(3,$diabetesDTO->getData_diagnostico());
            $stmt->bindValue(4,$diabetesDTO->getMeta_min());
            $stmt->bindValue(5,$diabetesDTO->getMeta_max());
            $stmt->bindValue(6,$diabetesDTO->getId_usuario());
            $retorno = $stmt->execute();
            return $retorno;
        }catch(PDOException $e){
            echo $e->getMessage();
        }
    }

}

?>