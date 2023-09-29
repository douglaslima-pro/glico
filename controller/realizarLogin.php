<?php

require_once "../model/DTO/usuarioDTO.php";
require_once "../model/DAO/usuarioDAO.php";

if(isset($_POST["submit"])){

    $email_usuario = $_POST["email-usuario"];    
    $senha = $_POST["senha"];

    $usuarioDTO = new usuarioDTO("",$email_usuario,$email_usuario,$senha);
    
    $usuarioDAO = new usuarioDAO();
    $retorno = $usuarioDAO->realizarLogin($usuarioDTO);

    if(empty($retorno) || $retorno == NULL || $retorno == 0){
        header("location:../view/html/login.php?msg=erro:<b>Erro</b><br>Credenciais inválidas!");
    }else{
        session_start();
        $_SESSION["id_usuario"] = $retorno["id_usuario"];
        $_SESSION["nome"] = $retorno["nome"];
        $_SESSION["email"] = $retorno["email"];
        $_SESSION["usuario"] = $retorno["usuario"];
        $_SESSION["cpf"] = $retorno["cpf"];
        $_SESSION["foto"] = $retorno["foto"];
        $_SESSION["sexo"] = $retorno["sexo"];
        $_SESSION["peso"] = $retorno["peso"];
        $_SESSION["altura"] = $retorno["altura"];
        $_SESSION["data_nascimento"] = $retorno["data_nascimento"];
        $_SESSION["data_cadastro"] = $retorno["data_cadastro"];
        $_SESSION["perfil"] = $retorno["perfil"];
        header("location:../view/html/home.php?msg=sucesso:<b>Sucesso</b><br>Login efetuado com sucesso!");
    }

}else{
    header("location:../view/html/login.php?msg=info:<b>O site informa</b><br>Alguma coisa deu errado no formulário!");
}


?>