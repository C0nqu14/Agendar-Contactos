<?php

$nome = $_POST["nome"];
$numero = $_POST["numero"];
$operadora = $_POST["operadora"];
$numero_antigo = $_POST["numero_antigo"];

if (empty($nome) || strlen($numero) < 9) {
    header("location: editar.php?numero=$numero_antigo&msg=Preencha devidamente os campos");
    exit;
}

$arquivo = fopen("dados.csv", "r");
$temp = fopen("temp.csv", "w");

while (($dados = fgetcsv($arquivo)) !== false) {
    if ($dados[1] == $numero_antigo) {
        fputcsv($temp, [$nome, $numero, $operadora]);
    } else {
        fputcsv($temp, $dados);
    }
}

fclose($arquivo);
fclose($temp);

rename("temp.csv", "dados.csv");

header("location: index.php?msg=Contato editado com sucesso.");
?>
