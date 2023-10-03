<?php

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

header("location:../view/html/login.php?msg=info:<b>O site informa</b><br>Você saiu da sua conta!");

?>