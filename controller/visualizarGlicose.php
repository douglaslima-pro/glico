<?php

session_start();

require_once "../model/DAO/glicoseDAO.php";

$id_glicose = filter_input(INPUT_POST,"id_glicose",FILTER_VALIDATE_INT);

$glicoseDAO = new glicoseDAO();
$glicose = $glicoseDAO->visualizarGlicose($id_glicose,$_SESSION["id_usuario"]);

if($glicose != NULL && !empty($glicose)){
    echo json_encode($glicose);
}

?>