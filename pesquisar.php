<?php

$pesquisa = $_GET["pesquisa"] ?? '';

if (empty($pesquisa)) {
    header("location: index.php?msg=Contacto não encontrado");
    exit;
}

header("location: index.php?pesquisa={$pesquisa}");
?>