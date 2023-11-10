<?php

session_start();

require_once "../model/DAO/usuarioDAO.php";

$senhaAtual = filter_input(INPUT_POST,"senha_atual",FILTER_DEFAULT);
$senhaNova = password_hash(filter_input(INPUT_POST,"senha_nova",FILTER_DEFAULT),PASSWORD_DEFAULT);

if(password_verify($senhaAtual,$_SESSION["senha"])){
    
    $usuarioDAO = new usuarioDAO();
    $retorno = $usuarioDAO->alterarSenha($_SESSION["id_usuario"],$senhaNova);

    if($retorno != NULL && !empty($retorno)){
        $_SESSION["senha"] = $senhaNova;
        $resposta = array(
            "status" => true,
            "msg" => array(
                "alertClass" => "alert--success",
                "iconClass" => "fa-check",
                "title" => "Sucesso",
                "text" => "A senha foi alterada com sucesso!"
            )
        );
    }else{
        $resposta = array(
            "status" => false,
            "msg" => array(
                "alertClass" => "alert--error",
                "iconClass" => "fa-xmark",
                "title" => "Erro",
                "text" => "Não foi possível alterar a senha!"
            )
        );
    }
}else{
    $resposta = array(
        "status" => false,
        "msg" => array(
            "alertClass" => "alert--error",
            "iconClass" => "fa-xmark",
            "title" => "Erro",
            "text" => "A senha atual está errada!"
        )
    );
}

echo json_encode($resposta);

?>