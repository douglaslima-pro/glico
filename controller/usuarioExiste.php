<?php

require_once "../model/DAO/usuarioDAO.php";

$usuario = $_POST["usuario"];

$usuarioDAO = new usuarioDAO();
$retorno = $usuarioDAO->usuarioExiste($usuario);

echo $retorno ? 'true' : 'false';

?>