<?php

session_start();

require_once "../model/DAO/glicoseDAO.php";

$id_glicose = filter_input(INPUT_POST,"id_glicose",FILTER_VALIDATE_INT);

$glicoseDAO = new glicoseDAO();
$retorno = $glicoseDAO->excluirGlicose($id_glicose,$_SESSION["id_usuario"]);

if($retorno == NULL || empty($retorno)){
    echo "false";
}else{
    echo "true";
}

?>