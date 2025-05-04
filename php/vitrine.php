<?php
// Incluindo o arquivo de conexão
include 'conection.php';

// Consulta para pegar os produtos destacados
try {
    $sql = "SELECT * FROM produtos WHERE destaque = 1"; // Consulta para produtos destacados
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
    $destaques = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Consulta para pegar os produtos mais vendidos
    $sqlMaisVendidos = "SELECT * FROM produtos WHERE mais_vendido = 1"; // Ajuste o número conforme necessário
    $stmtMaisVendidos = $pdo->prepare($sqlMaisVendidos);
    $stmtMaisVendidos->execute();
    $maisVendidos = $stmtMaisVendidos->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo json_encode(['erro' => 'Erro ao buscar os produtos: ' . $e->getMessage()]);
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilmar Móveis</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <!-- Seção de Destaques -->
    <section class="vitrine">
    <h2 class="vitrine-titulo">Destaques</h2>
    <div class="carousel-container">
        <button class="prev-btn">&#10094;</button>
        <div class="carousel">
            <?php foreach ($destaques as $produto) {
                // Calculando o valor de parcelamento
                $valorParcela = number_format($produto['preco'] / 5, 2, ',', '.');
            ?>
                <div class="product">
                    <a href="product.php?id=<?= $produto['id']; ?>"> <!-- Link para a página do produto -->
                        <img src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">
                        <h3><?= $produto['nome']; ?></h3>
                        <p class="preco"><?= 'R$ ' . number_format($produto['preco'], 2, ',', '.'); ?></p>
                        <p class="parcelamento">ou em 5x de R$ <?= $valorParcela; ?></p>
                        <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                    </a>
                </div>
            <?php } ?>
        </div>
        <button class="next-btn">&#10095;</button>
    </div>

    <!-- Seção de Mais Vendidos -->
    <h2 class="vitrine-titulo">Mais Vendidos</h2>
    <div class="carousel-container">
        <button class="prev-btn">&#10094;</button>
        <div class="carousel">
            <?php foreach ($maisVendidos as $produto) {
                // Calculando o valor de parcelamento
                $valorParcela = number_format($produto['preco'] / 5, 2, ',', '.');
            ?>
                <div class="product">
                    <a href="product.php?id=<?= $produto['id']; ?>"> <!-- Link para a página do produto -->
                        <img src="<?= $produto['imagem']; ?>" alt="<?= $produto['nome']; ?>">
                        <h3><?= $produto['nome']; ?></h3>
                        <p class="preco"><?= 'R$ ' . number_format($produto['preco'], 2, ',', '.'); ?></p>
                        <p class="parcelamento">ou em 5x de R$ <?= $valorParcela; ?></p>
                        <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                    </a>
                </div>
            <?php } ?>
        </div>
        <button class="next-btn">&#10095;</button>
    </div>
</section>



    <script src="../js/script.js"></script>

</body>

</html>