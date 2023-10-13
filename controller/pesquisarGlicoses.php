<?php

session_start();

require_once "../model/DAO/glicoseDAO.php";

$id_usuario = $_POST["id_usuario"];
$limite = $_POST["limite"];
$inicio = $_POST["inicio"];

$glicoseDAO = new glicoseDAO();
$glicoses = $glicoseDAO->pesquisarGlicoses($id_usuario,$limite,$inicio);

if($glicoses != NULL && !empty($glicoses) && $glicoses != 0) {
    echo json_encode($glicoses);
}

?>