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

    <div class="mobile-search">
        <form action="/busca" id="form-search-header" method="post" accept-charset="utf-8">
            <div style="display:none;"><input type="hidden" name="_method" value="POST">
            </div>
            <div class="search-inner"><input name="data[Search][filter]" autocomplete="off" class="search-field"
                    placeholder="o que você procura?" type="text" id="SearchFilter"><button class="btn btn-search"
                    type="submit" aria-label="O que você procura?"><span class="icon-search btn-icon"></span><span
                        class="btn-text">Pesquisar</span></button></div>
        </form>
    </div>

    <div class="clear"></div>

    <?php include '../tools/menu.html'; ?>

            <h1 id="titulo-categoria">Produtos</h1>
            <div class="produtos-container" id="produtos-container"></div>
            </div>

    <?php include '../tools/footer.html'; ?>
    </div>

    <script src="../js/products.js"></script>
</body>

</html>