<?php

$numero = $_GET['numero'];

if (empty($numero)) {
    header("location: index.php?msg=Contato não encontrado.");
    exit;
}

$arquivo = fopen("dados.csv", "r");
$dados_novo = fopen("dados_novo.csv", "w");

while (($dados = fgetcsv($arquivo)) !== false) {
    if ($dados[1] !== $numero) {
        fputcsv($dados_novo, $dados);
    }
}

fclose($arquivo);
fclose($dados_novo);

rename("dados_novo.csv", "dados.csv");

header("location: index.php?msg=Contato deletado");
?>