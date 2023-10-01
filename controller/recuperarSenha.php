<?php

require_once "enviarEmail.php";
require_once "../model/DAO/usuarioDAO.php";

$emailUsuario = $_POST["emailusuario"];

$usuarioDAO = new usuarioDAO();

if($usuarioDAO->emailExiste($emailUsuario) || $usuarioDAO->usuarioExiste($emailUsuario)){
    $usuario = $usuarioDAO->pesquisarUsuarioPeloEmailUsuario($emailUsuario);
    //A função enviarEmail retorna uma string que suja o console, para isso é necessário armazenar a saída dela em um buffer e apagar depois
    ob_start(); //ativa o buffer da saída
    enviarEmail($usuario["email"],$usuario["nome"],"Link para alterar a senha","Olá ".explode(" ",$usuario["nome"])[0].",<br><br>Você solicitou recuperar sua senha. Para isso basta entrar no link e fazer a alteração: <a href='http://localhost/douglas/glico/'>http://localhost/douglas/glico/</a>");
    ob_end_clean(); //limpa o buffer da saída
    echo "true";
}else{
    echo "false";
}

?>