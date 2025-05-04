<!-- detalhes_produto.html -->
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gilmar Móveis</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div>
        <?php include '../tools/header.html'; ?>
    </div>

    <div class="clear"></div>

    <?php include '../tools/menu.html'; ?>

    <div class="produto-detalhe">
        <div id="navegacao-categorias"></div> <!-- Aqui entram os links -->
        <h1 id="nome-produto"></h1>

        <div class="imagem-e-preco">
            <img id="imagem-produto" src="" alt="">
            <div class="preco-e-aviso">
                <p id="preco-produto"></p>
                <p id="aviso-parcelamento" class="aviso-parcelamento"></p>
            </div>
        </div>

        <div id="whatsapp-link" class="whatsapp-link"></div>


        <p id="descricao-produto"></p>

    </div>

    <div>
        <?php include '../tools/footer.html'; ?>
    </div>

    <script src="../js/product.js"></script>
    <script src="../js/script.js"></script>
</body>

</html>