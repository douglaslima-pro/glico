<?php

require_once "../model/DAO/glicoseDAO.php";

$id_usuario = $_POST["id_usuario"];

$glicoseDAO = new glicoseDAO();
$count = $glicoseDAO->contarGlicoses($id_usuario)["count"];

echo $count;

?>