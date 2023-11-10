<?php

require_once "./alertMessage.php";
require_once "../model/DTO/usuarioDTO.php";
require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DAO/recuperacaoDAO.php";

if(isset($_POST["submit"])){

    $email_usuario = $_POST["email-usuario"];    
    $senha = $_POST["senha"];

    $usuarioDTO = new usuarioDTO("",$email_usuario,$email_usuario,$senha);
    
    $usuarioDAO = new usuarioDAO();
    $retorno = $usuarioDAO->realizarLogin($usuarioDTO);

    if(empty($retorno) || $retorno == NULL || $retorno == 0){
        $msg = alertMessage("alert--error","fa-xmark","Erro","Credenciais inválidas!");
        header("location:../view/html/login.php?msg=$msg");
    }else{
        session_start();
        $_SESSION["id_usuario"] = $retorno["id_usuario"];
        $_SESSION["nome"] = $retorno["nome"];
        $_SESSION["email"] = $retorno["email"];
        $_SESSION["usuario"] = $retorno["usuario"];
        $_SESSION["senha"] = $retorno["senha"];
        $_SESSION["cpf"] = $retorno["cpf"];
        $_SESSION["foto"] = $retorno["foto"];
        $_SESSION["sexo"] = $retorno["sexo"];
        $_SESSION["peso"] = $retorno["peso"];
        $_SESSION["altura"] = $retorno["altura"];
        $_SESSION["data_nascimento"] = $retorno["data_nascimento"];
        $_SESSION["data_cadastro"] = $retorno["data_cadastro"];
        $_SESSION["perfil"] = $retorno["perfil"];
        $_SESSION["tipo_diabetes"] = $retorno["tipo_diabetes"];
        $_SESSION["terapia"] = $retorno["terapia"];
        $_SESSION["data_diagnostico"] = $retorno["data_diagnostico"];
        $_SESSION["meta_max"] = $retorno["meta_max"];
        $_SESSION["meta_min"] = $retorno["meta_min"];
        //exclui todas as solicitações de recuperação de senha do usuário
        $recuperacaoDAO = new recuperacaoDAO();
        $recuperacaoDAO->excluirRecuperacao($_SESSION["id_usuario"]);
        //manda o usuário para a página inicial
        $msg = alertMessage("alert--success","fa-check","Sucesso","Login efetuado com sucesso!");
        header("location:../view/html/home.php?msg=$msg");
    }

}else{
    $msg = alertMessage("alert--info","fa-info","O site informa","Alguma coisa deu errado no formulário!");
    header("location:../view/html/login.php?msg=$msg");
}


?>