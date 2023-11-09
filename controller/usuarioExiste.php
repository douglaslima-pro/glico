<?php

require_once "../model/DAO/usuarioDAO.php";

$usuario = $_POST["usuario"];

$usuarioDAO = new usuarioDAO();
$usuarioExiste = $usuarioDAO->usuarioExiste($usuario);

if($usuarioExiste){
    $resposta = array(
        "status" => true
    );
}else{
    $resposta = array(
        "status" => false
    );
}

echo json_encode($resposta);

?>