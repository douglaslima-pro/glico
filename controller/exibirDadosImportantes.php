<?php

require_once "../model/DAO/glicoseDAO.php";

$id_usuario = filter_input(INPUT_POST,"id_usuario",FILTER_VALIDATE_INT);

$glicoseDAO = new glicoseDAO();

$media = $glicoseDAO->mediaGlicoses($id_usuario);
$hipoglicemias = $glicoseDAO->calcularHipoglicemias($id_usuario);
$hiperglicemias = $glicoseDAO->calcularHiperglicemias($id_usuario);

$dadosImportantes = array(
    "media" => $media,
    "hipoglicemias" => $hipoglicemias,
    "hiperglicemias" => $hiperglicemias
);

echo json_encode($dadosImportantes);

?>