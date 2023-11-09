<?php

require_once "../model/DAO/usuarioDAO.php";

$email = $_POST["email"];

$usuarioDAO = new usuarioDAO();
$emailExiste = $usuarioDAO->emailExiste($email);

if($emailExiste){
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