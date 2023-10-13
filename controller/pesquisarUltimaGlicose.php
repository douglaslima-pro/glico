<?php

require_once "../model/DAO/glicoseDAO.php";

$id_usuario = filter_input(INPUT_POST,"id_usuario",FILTER_VALIDATE_INT); //verifica se o input é do tipo int e armazena na variável

$glicoseDAO = new glicoseDAO();
$ultimaGlicose = $glicoseDAO->pesquisarUltimaGlicose($id_usuario);

if($ultimaGlicose == NULL || empty($ultimaGlicose)) {
    echo '--';
}else{
    echo $ultimaGlicose["valor"];
}

?>