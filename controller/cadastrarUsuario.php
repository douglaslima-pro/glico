<?php

require_once "../model/DTO/usuarioDTO.php";
require_once "../model/DAO/usuarioDAO.php";

if(isset($_POST["submit"])){

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $usuario = $_POST["usuario"];
    //CRIA UM HASH DA SENHA ANTES DE ARMAZENAR NO BANCO
    $senha = password_hash($_POST["senha"],PASSWORD_DEFAULT);
    //PEGA A DATA ATUAL E COLOCA NA VARIÁVEL DATA_CADASTRO
    date_default_timezone_set("America/Sao_Paulo");
    $data_cadastro = date("Y-m-d");
    $data_nascimento = $_POST["data_nascimento"];
    $cpf = $_POST["cpf"];

    $usuarioDTO = new usuarioDTO($nome,$usuario,$email,$senha);
    $usuarioDTO->setData_cadastro($data_cadastro);
    $usuarioDTO->setData_nascimento($data_nascimento);
    $usuarioDTO->setCpf($cpf);

    $usuarioDAO = new usuarioDAO();
    $retorno = $usuarioDAO->cadastrarUsuario($usuarioDTO);

    if(empty($retorno) || $retorno == NULL || $retorno == 0){
        header("location:../view/html/cadastro.php?msg=erro:<b>Erro</b><br>Não foi possível finalizar o cadastro!");
    }else{
        header("location:../view/html/login.php?msg=sucesso:<b>Sucesso</b><br>Cadastro criado com sucesso!");
    }

}else{
    header("location:../view/html/cadastro.php?msg=info:<b>O site informa</b><br>Alguma coisa deu errado no formulário!");
}

?>