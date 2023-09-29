<?php

require_once "../model/DAO/usuarioDAO.php";

$email = $_POST["email"];

$usuarioDAO = new usuarioDAO();
$emailExiste = $usuarioDAO->emailExiste($email);

echo $emailExiste ? 'true' : 'false';

?>