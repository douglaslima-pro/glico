<?php

require_once "../model/DAO/glicoseDAO.php";
require_once "../model/DTO/glicoseDTO.php";

$valor = $_POST["valor"];
$data = $_POST["data"];
$hora = $_POST["hora"];
$comentario = $_POST["comentario"];
$condicao = $_POST["condicao"];
$id_usuario = $_POST["idusuario"];

$glicoseDTO = new glicoseDTO($valor,$data,$hora,$id_usuario);
$glicoseDTO->setComentario($comentario);
$glicoseDTO->setCondicao($condicao);

$glicoseDAO = new glicoseDAO();
$retorno = $glicoseDAO->registrarGlicose($glicoseDTO);

if($retorno == NULL || $retorno == 0 || empty($retorno)){
    echo 'false';
}else{
    echo 'true';
}

?>