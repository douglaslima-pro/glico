<?php

require_once "../model/DAO/glicoseDAO.php";

$id_glicose = $_POST["id_glicose"];
$comentario = $_POST["comentario"];

$glicoseDAO = new glicoseDAO();
$retorno = $glicoseDAO->editarGlicose($id_glicose,$comentario);

if($retorno == NULL || empty($retorno) || $retorno == 0){
    echo "false";
}else{
    echo "true";
}

?>