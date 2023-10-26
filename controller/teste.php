<?php

date_default_timezone_set("America/Sao_Paulo");

$hoje = date("d/m/Y");
echo $hoje;

echo "<br>";

$timestamp = strtotime("2023-10-25");
$data = date("d/m/Y",$timestamp);
echo $data;

echo "<br>";

$nascimento = DateTime::createFromFormat("d/m/Y","11/01/2003");
echo $nascimento->format("d/m/Y");

?>