<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema De Gerenciamento de Contactos</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <a href="index.php">Gerenciamento de Contactos</a>
        <div class="actions">
            <a href="adicionar.php">Adicionar contacto</a>
        </div>
    </header>

    <main>
        <section class="hero">
            <h1>Lista de contactos</h1>
            <p>Gerencie os seus contactos da melhor forma possivel</p>
        </section>

        <form action="pesquisar.php" method="get">
            <div class="form-group">
                <div class="form-group-content">
                    <label for="search">Pesquisa</label>
                    <input type="text" id="search" name="pesquisa" placeholder="Pesquise pelos seus contactos aqui">
                </div>

                <div>
                    <button>Pesquisar</button>
                </div>
            </div>
        </form>

        <section class="contact-list">
            <table>
                <thead>
                    <th>#</th>
                    <th>Nome</th>
                    <th>Numero</th>
                    <th>Operadora</th>
                    <th></th>
                </thead>
                <tbody>
                    <?php
                    $arquivo = fopen("dados.csv", "r");
                    $contactos = [];

                    fgetcsv($arquivo);

                    while (($dados = fgetcsv($arquivo)) !== false) {
                        array_push($contactos, $dados);
                    }
                    fclose($arquivo);

                    $pesquisa = isset($_GET['pesquisa']) ? $_GET['pesquisa'] : '';

                    $contactos_filtrados = array_filter($contactos, function ($contacto) use ($pesquisa) {
                        return stripos($contacto[0], $pesquisa) !== false || 
                               stripos($contacto[1], $pesquisa) !== false || 
                               stripos($contacto[2], $pesquisa) !== false;
                    });

                    if (empty($contactos_filtrados)) {
                        $contactos_filtrados = $contactos;
                    }

                    $i = 1;
                    foreach ($contactos_filtrados as $value) :
                    ?>

                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= htmlspecialchars($value[0]); ?></td>
                            <td><?= htmlspecialchars($value[1]); ?></td>
                            <td><?= htmlspecialchars($value[2]); ?></td>
                            <td>
                                <a href="editar.php?numero=<?= htmlspecialchars($value[1]); ?>">Editar</a>
                                <a href="deletar.php?numero=<?= htmlspecialchars($value[1]); ?>">Deletar</a>
                            </td>
                        </tr>

                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </main>
</body>

</html>