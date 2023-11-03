<?php

session_start();

require_once "../model/DAO/usuarioDAO.php";
require_once "../model/DTO/usuarioDTO.php";

$nome = filter_input(INPUT_POST,"nome",FILTER_DEFAULT);
$cpf = filter_input(INPUT_POST,"cpf",FILTER_DEFAULT);
$data_nascimento = filter_input(INPUT_POST,"data_nascimento",FILTER_DEFAULT);
$sexo = filter_input(INPUT_POST,"sexo",FILTER_DEFAULT);
$peso = filter_input(INPUT_POST,"peso",FILTER_DEFAULT);
$altura = filter_input(INPUT_POST,"altura",FILTER_DEFAULT);

$usuarioDTO = new usuarioDTO($nome,NULL,NULL,NULL);
$usuarioDTO->setCpf($cpf);
$usuarioDTO->setData_nascimento($data_nascimento);
$usuarioDTO->setSexo($sexo);
$usuarioDTO->setPeso($peso);
$usuarioDTO->setAltura($altura);
$usuarioDTO->setId_usuario($_SESSION["id_usuario"]);

$usuarioDAO = new usuarioDAO();
$retorno = $usuarioDAO->alterarDadosPessoais($usuarioDTO);

$response;

if($retorno == NULL || empty($retorno)){
    $response = array(
        "status" => false
    );
}else{
    $response = array(
        "status" => true
    );
    $_SESSION["nome"] = $nome;
    $_SESSION["cpf"] = $cpf;
    $_SESSION["data_nascimento"] = $data_nascimento;
    $_SESSION["sexo"] = $sexo;
    $_SESSION["peso"] = $peso;
    $_SESSION["altura"] = $altura;
}

echo json_encode($response);

?>