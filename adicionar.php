<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Gerenciamento de Contactos</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="adicionar.css">
</head>

<body>
    <header>
        <a href="index.php">Voltar</a>
    </header>

    <main>
        <section class="hero">
            <h1>Adicionar um novo contacto</h1>
            <p>Preencha os campos abaixo para adicionar um contacto</p>
        </section>
    </main>

    <?php
    #echo $_GET["msg"];
    ?>

    <form action="logica-cadastro.php" id="add-form" method="post">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" placeholder="Digite seu nome" id="nome" name="nome">
        </div>

        <div class="form-group">
            <label for="numero">Numero</label>
            <input type="number" placeholder="Digite seu numero" id="numero" name="numero">
        </div>

        <div class="form-group">
            <label for="operadora">Operadora</label>
            <select name="operadora">
                <option value="unitel">Unitel</option>
                <option value="movicel">Movicel</option>
                <option value="africell">Africell</option>
            </select>
        </div>

        <button type="submit">Cadastrar</button>
    </form>
</body>

</html>