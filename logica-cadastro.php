<?php

$nome = $_POST["nome"];
$numero = $_POST["numero"];
$operadora = $_POST["operadora"];

if (empty($nome) || strlen($numero) < 9) {
    header("location: adicionar.php?msg=Preencha novamente os campos");
}

$arquivo = fopen("dados.csv", "a+");

if (fputcsv($arquivo, [$nome, $numero, $operadora])) {
    fclose($arquivo);
    header("location: index.php?msg=Contacto Adicionado");
}
