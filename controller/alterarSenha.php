<?php

require_once "alertMessage.php";
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DAO/recuperacaoDAO.php";

$usuario = filter_input(INPUT_POST,"usuario",FILTER_DEFAULT);
$senha = password_hash(filter_input(INPUT_POST,"senha",FILTER_DEFAULT),PASSWORD_DEFAULT);
$id_usuario = filter_input(INPUT_POST,"id_usuario",FILTER_VALIDATE_INT);
$chave = filter_input(INPUT_POST,"chave",FILTER_DEFAULT);

$usuarioDAO = new usuarioDAO();
$recuperacaoDAO = new recuperacaoDAO();

if($usuarioDAO->emailExiste($usuario) || $usuarioDAO->usuarioExiste($usuario)){
    
    $retorno = $usuarioDAO->alterarSenha($id_usuario,$senha);

    if($retorno == NULL || empty($retorno)){
        $msg = alertMessage("alert--error","fa-xmark","Erro","Não foi possível alterar a senha. Tente novamente!");
        header("location:../view/html/alterar-senha.php?id_usuario=$id_usuario&chave=$chave&msg=$msg");
    }else{
        $recuperacaoDAO->excluirRecuperacao($id_usuario);
        $msg = alertMessage("alert--success","fa-check","Sucesso","A sua senha foi alterada com sucesso!");
        header("location:../view/html/login.php?msg=$msg");
    }
}else{
    $msg = alertMessage("alert--error","fa-xmark","Erro","Não localizamos o usuário informado!");
    header("location:../view/html/alterar-senha.php?id_usuario=$id_usuario&chave=$chave&msg=$msg");
}

?>