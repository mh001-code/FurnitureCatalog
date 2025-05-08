<?php
// Define o tipo de conteúdo
header('Content-Type: text/html; charset=utf-8');

// Inclui o arquivo de conexão
include '../php/conection.php'; // Inclui a conexão com o banco

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Captura o termo de pesquisa vindo do formulário
    $pesquisa = $_GET['pesquisa'] ?? '';

    $resultados = [];

    if ($pesquisa) {
        $stmt = $pdo->prepare("SELECT * FROM produtos WHERE nome LIKE :pesquisa OR subcategoria LIKE :pesquisa");
        $stmt->execute(['pesquisa' => '%' . $pesquisa . '%']);
        $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados da Pesquisa</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div>
        <?php include '../tools/header.html'; ?>
    </div>

    <div>
        <?php include '../tools/menu.html'; ?>
    </div>

    <div>
        <h1>Resultados da Pesquisa</h1>

        <?php if (empty($resultados)) : ?>
            <p>Nenhum produto encontrado para <strong><?= htmlspecialchars($pesquisa) ?></strong>.</p>
        <?php else : ?>
            <div class="produtos-container">
                <?php foreach ($resultados as $produto) : ?>
                    <div class="product">
                        <!-- Link para redirecionar para a página do produto -->
                        <a href="../pages/product.php?id=<?= $produto['id'] ?>">
                            <img src="<?= htmlspecialchars($produto['imagem']) ?>" alt="<?= htmlspecialchars($produto['nome']) ?>">

                            <!-- Nome do produto -->
                            <h3><?= htmlspecialchars($produto['nome']) ?></h3>

                            <!-- Preço -->
                            <p class="preco"><strong>R$ <?= number_format($produto['preco'], 2, ',', '.') ?></strong></p>

                            <!-- Parcelamento -->
                            <p class="parcelamento">ou em 5x de R$ <?= number_format($produto['preco'] / 5, 2, ',', '.') ?></p>
                            <br>
                            <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                        </a>
                    </div>

                <?php endforeach; ?>
            </div>
        <?php endif; ?>

    </div>

    <div>
        <?php include '../tools/footer.html'; ?>
    </div>
    
    <script src="../js/products.js"></script>
    <script src="../js/script.js"></script>

</body>

</html>