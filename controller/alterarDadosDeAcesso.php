<?php

session_start();

require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$email = filter_input(INPUT_POST,"email",FILTER_DEFAULT);
$usuario = filter_input(INPUT_POST,"usuario",FILTER_DEFAULT);

$usuarioDTO = new usuarioDTO(NULL,$usuario,$email,NULL);
$usuarioDTO->setId_usuario($_SESSION["id_usuario"]);
$usuarioDAO = new usuarioDAO();
$retorno = $usuarioDAO->alterarDadosDeAcesso($usuarioDTO);

$response;

if($retorno == NULL || empty($retorno)){
    $response = array(
        "status" => false
    );
}else{
    $response = array(
        "status" => true
    );
    $_SESSION["email"] = $email;
    $_SESSION["usuario"] = $usuario;
}

echo json_encode($response);

?>