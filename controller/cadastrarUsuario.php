<?php

require_once "../model/DTO/usuarioDTO.php";
require_once "../model/DAO/usuarioDAO.php";

if(isset($_POST["submit"])){

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];

    //CRIA UM HASH DA SENHA ANTES DE ARMAZENAR NO BANCO
    $senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);

    date_default_timezone_set("America/Sao_Paulo");
    $data_cadastro = date("Y-m-d");
    $data_nascimento = $_POST["data_nascimento"];
    $cpf = $_POST["cpf"];

    $usuarioDTO = new usuarioDTO($nome,$usuario,$email,$senha);
    $usuarioDTO->setData_cadastro($data_cadastro);
    $usuarioDTO->setData_nascimento($data_nascimento);
    $usuarioDTO->setCpf($cpf);

    echo $usuarioDTO->getNome();
    echo "<br>".$usuarioDTO->getUsuario();
    echo "<br>".$usuarioDTO->getEmail();
    echo "<br>".$usuarioDTO->getSenha();
    echo "<br>".$usuarioDTO->getData_cadastro();
    echo "<br>".$usuarioDTO->getData_nascimento();
    echo "<br>".$usuarioDTO->getCpf();


    $usuarioDAO = new usuarioDAO();
    $retorno = $usuarioDAO->cadastrarUsuario($usuarioDTO);

    if(empty($retorno) || $retorno == NULL || $retorno == 0){
        header("location:../view/html/login.php?msg=ERRO no cadastro!");
    }else{
        header("location:../view/html/login.php?msg=Cadastro criado com sucesso!");
    }

}else{
    header("location:../view/html/login.php?msg=ERRO no formulário ou no controller!");
}

?>