<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Contacto</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="editar.css">
</head>

<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>

    <main>
        <section class="hero">
            <h1>Editar contacto</h1>
            <p>Preencha os campos abaixo para editar o contacto</p>
        </section>
    </main>

    <?php
    $numero = $_GET['numero'];
    $arquivo = fopen("dados.csv", "r");
    while (($dados = fgetcsv($arquivo)) !== false) {
        if ($dados[1] == $numero) {
            $nome = $dados[0];
            $operadora = $dados[2];
            break;
        }
    }
    fclose($arquivo);
    ?>

    <form action="logica-editar.php" id="edit-form" method="post">
        <input type="hidden" name="numero_antigo" value="<?= $numero ?>">

        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" value="<?= $nome ?>" id="nome" name="nome">
        </div>

        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="number" value="<?= $numero ?>" id="numero" name="numero">
        </div>

        <div class="form-group">
            <label for="operadora">Operadora</label>
            <select name="operadora">
                <option value="unitel" <?= $operadora == 'unitel' ? 'selected' : '' ?>>Unitel</option>
                <option value="movicel" <?= $operadora == 'movicel' ? 'selected' : '' ?>>Movicel</option>
                <option value="africell" <?= $operadora == 'africell' ? 'selected' : '' ?>>Africell</option>
            </select>
        </div>

        <button type="submit">Salvar</button>
    </form>
</body>
</html>