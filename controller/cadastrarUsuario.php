<?php

require_once "./alertMessage.php";
require_once "../model/DTO/usuarioDTO.php";
require_once "../model/DAO/usuarioDAO.php";

if(isset($_POST["submit"])){

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    //CRIA UM HASH DA SENHA ANTES DE ARMAZENAR NO BANCO
    $senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);
    $data_nascimento = $_POST["data_nascimento"];
    $cpf = $_POST["cpf"];

    $usuarioDTO = new usuarioDTO($nome,$usuario,$email,$senha);
    $usuarioDTO->setData_nascimento($data_nascimento);
    $usuarioDTO->setCpf($cpf);

    $usuarioDAO = new usuarioDAO();
    $retorno = $usuarioDAO->cadastrarUsuario($usuarioDTO);

    if(empty($retorno) || $retorno == NULL || $retorno == 0){
        $msg = alertMessage("alert--error","fa-xmark","Erro","Não foi possível finalizar o cadastro!");
        header("location:../view/html/cadastro.php?msg=$msg");
    }else{
        $msg = alertMessage("alert--success","fa-check","Sucesso","Cadastro criado com sucesso!");
        header("location:../view/html/login.php?msg=$msg");
    }

}else{
    $msg = alertMessage("alert--info","fa-info","O site informa","Alguma coisa deu errado no formulário!");
    header("location:../view/html/cadastro.php?msg=$msg");
}

?>