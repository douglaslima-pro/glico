<?php

require_once "alertMessage.php";

session_start();

unset(
$_SESSION["id_usuario"],
$_SESSION["nome"],
$_SESSION["email"],
$_SESSION["usuario"],
$_SESSION["cpf"],
$_SESSION["foto"],
$_SESSION["sexo"],
$_SESSION["peso"],
$_SESSION["altura"],
$_SESSION["data_nascimento"],
$_SESSION["data_cadastro"],
$_SESSION["perfil"]
);

session_destroy();

$msg = alertMessage("alert--info","fa-info","O site informa","Você saiu da sua conta!");
header("location:../view/html/login.php?msg=$msg");

?>