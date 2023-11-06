<?php

session_start();

require_once "../model/DAO/diabetesDAO.php";
require_once "../model/DTO/diabetesDTO.php";

$tipo_diabetes = filter_input(INPUT_POST,"tipo_diabetes",FILTER_DEFAULT);
$terapia = filter_input(INPUT_POST,"terapia",FILTER_DEFAULT);
$data_diagnostico = filter_input(INPUT_POST,"data_diagnostico",FILTER_DEFAULT);
$meta_min = filter_input(INPUT_POST,"meta_min",FILTER_VALIDATE_INT);
$meta_max = filter_input(INPUT_POST,"meta_max",FILTER_VALIDATE_INT);

$diabetesDTO = new diabetesDTO($_SESSION["id_usuario"]);
$diabetesDTO->setTipo_diabetes($tipo_diabetes);
$diabetesDTO->setTerapia($terapia);
$diabetesDTO->setData_diagnostico($data_diagnostico);
$diabetesDTO->setMeta_min($meta_min);
$diabetesDTO->setMeta_max($meta_max);

$diabetesDAO = new diabetesDAO();
$retorno = $diabetesDAO->alterarDiabetes($diabetesDTO);

$response;

if($retorno == NULL || empty($retorno)){
    $response = array(
        "status" => false
    );
}else{
    $response = array(
        "status" => true
    );
    $_SESSION["tipo_diabetes"] = $tipo_diabetes;
    $_SESSION["terapia"] = $terapia;
    $_SESSION["data_diagnostico"] = $data_diagnostico;
    $_SESSION["meta_min"] = $meta_min;
    $_SESSION["meta_max"] = $meta_max;
}

echo json_encode($response);

?>