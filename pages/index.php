<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gilmar Móveis</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>

    <div>
        <?php include '../tools/header.html'; ?>
    </div>


    <div>
        <?php include '../tools/menu.html'; ?>
    </div>


    <div class="slider">

        <div class="slides">
            <input type="radio" name="radio-btn" id="radio1">
            <input type="radio" name="radio-btn" id="radio2">
            <input type="radio" name="radio-btn" id="radio3">
            <input type="radio" name="radio-btn" id="radio4">

            <div class="slide first">
                <img src='../img/banner_images/Entrega_montagem.png' alt="image 1">
            </div>

           <div class="slide">
                <img src='../img/banner_images/Parcelamento.png' alt="image 2">
            </div>

            <!--<div class="slide">
                <img src="https://cdn.dlojavirtual.com/static1/102066/banner/topo_170474187499560.png" alt="image 3">
            </div>

            <div class="slide">
                <img src="https://cdn.dlojavirtual.com/static1/102066/banner/topo_170474184517299.png" alt="image 4">
            </div>-->

            <div class="navigation-auto">
                <div class="auto-btn1"></div>
                <div class="auto-btn2"></div>
                <!--<div class="auto-btn3"></div>
                <div class="auto-btn4"></div>-->
            </div>
        </div>

        <div class="manual-navigation">
            <label for="radio1" class="manual-btn"></label>
            <label for="radio2" class="manual-btn"></label>
            <!--<label for="radio3" class="manual-btn"></label>
            <label for="radio4" class="manual-btn"></label>-->
        </div>
    </div>

    <section class="vitrine">
        <h2 class="vitrine-titulo">Destaques</h2>

        <div class="carousel-container">
            <button class="prev-btn">&#10094;</button>
            <div class="carousel">
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_sala-de-estar-racks-rack-paladio-p-1692372833516.jpg"
                        alt="Produto 1">
                    <h3>Rack Paládio</h3>
                    <p class="preco">R$ 409,00</p>
                    <p class="parcelamento">ou em 5x de R$ 81,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-roupeiro-orion-p-1721836837518.jpg"
                        alt="Produto 2">
                    <h3>Roupeiro Orion</h3>
                    <p class="preco">R$ 2.799</p>
                    <p class="parcelamento">ou em 5x de R$ 559,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-sala-de-estar-painel-com-detalhes-em-ripado-p-1692192814203.jpeg"
                        alt="Produto 3">
                    <h3>Painel Treviso</h3>
                    <p class="preco">R$ 2.099,00</p>
                    <p class="parcelamento">ou em 5x de R$ 419,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-beliche-havana-plus-3-gavetas-p-1693406633270.jpg"
                        alt="Produto 4">
                    <h3>Beliche Havana Plus 3 Gavetas</h3>
                    <p class="preco">R$ 1.499,00</p>
                    <p class="parcelamento">ou em 5x de R$ 299,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-guarda-roupa-sorento-c-espelho-p-1701368896196.jpg"
                        alt="Produto 4">
                    <h3>Guarda Roupa Sorento C/ Espelho</h3>
                    <p class="preco">R$ 2.399,00</p>
                    <p class="parcelamento">ou em 5x de R$ 479,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img
                        src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-sala-de-estar-sofa-reclinavel-com-acento-retratil-p-1692192029301.jpeg">
                    <h3>Sofá reclinável com acento retrátil 2.40m</h3>
                    <p class="preco">R$ 3.899,00</p>
                    <p class="parcelamento">ou em 5x de R$ 779,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-cozinha-cozinha-modulada-intenza-p-1716926543230.png"
                        alt="Produto 4">
                    <h3>COZINHA MODULADA INTENZA</h3>
                    <p class="preco">R$ 1.499,00</p>
                    <p class="parcelamento">ou em 5x de R$ 299,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img
                        src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_sala-de-estar-paineis-home-garbo-ripado-p-1707412503202.jpg">
                    <h3>HOME ARBO RIPADO</h3>
                    <p class="preco">R$ 1.599,00</p>
                    <p class="parcelamento">ou em 5x de R$ 319,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img
                        src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-comoda-sky-1p-3g-p-1695923548177.jpg">
                    <h3>Comoda Sky 1P 3G</h3>
                    <p class="preco">R$ 459,00</p>
                    <p class="parcelamento">ou em 5x de R$ 91,80</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
            </div>
            <button class="next-btn">&#10095;</button>
        </div>

        <h2 class="vitrine-titulo">Mais Vendidos</h2>

        <div class="carousel-container">
            <button class="prev-btn">&#10094;</button>
            <div class="carousel">
                <div class="product">
                    <img
                        src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_sala-de-estar-paineis-home-garbo-ripado-p-1707412503202.jpg">
                    <h3>HOME ARBO RIPADO</h3>
                    <p class="preco">R$ 1.599,00</p>
                    <p class="parcelamento">ou em 10x de R$ 159,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img
                        src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-sala-de-estar-sofa-reclinavel-com-acento-retratil-p-1692192029301.jpeg">
                    <h3>Sofá reclinável com acento retrátil 2.40m</h3>
                    <p class="preco">R$ 3.899,00</p>
                    <p class="parcelamento">ou em 10x de R$ 389,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-cozinha-cozinha-modulada-intenza-p-1716926543230.png"
                        alt="Produto 4">
                    <h3>COZINHA MODULADA INTENZA</h3>
                    <p class="preco">R$ 1.499,00</p>
                    <p class="parcelamento">ou em 10x de R$ 149,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_sala-de-estar-racks-rack-paladio-p-1692372833516.jpg"
                        alt="Rack Paládio">
                    <h3>Rack Paládio</h3>
                    <p class="preco">R$ 409,00</p>
                    <p class="parcelamento">ou em 10x de R$ 40,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img
                        src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-comoda-sky-1p-3g-p-1695923548177.jpg">
                    <h3>Comoda Sky 1P 3G</h3>
                    <p class="preco">R$ 459,00</p>
                    <p class="parcelamento">ou em 10x de R$ 45,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-sala-de-estar-painel-com-detalhes-em-ripado-p-1692192814203.jpeg"
                        alt="Produto 3">
                    <h3>Painel Treviso</h3>
                    <p class="preco">R$ 2.099,00</p>
                    <p class="parcelamento">ou em 10x de R$ 209,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-guarda-roupa-sorento-c-espelho-p-1701368896196.jpg"
                        alt="Produto 4">
                    <h3>Guarda Roupa Sorento C/ Espelho</h3>
                    <p class="preco">R$ 2.399,00</p>
                    <p class="parcelamento">ou em 10x de R$ 239,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-roupeiro-orion-p-1721836837518.jpg"
                        alt="Produto 2">
                    <h3>Roupeiro Orion</h3>
                    <p class="preco">R$ 2.799</p>
                    <p class="parcelamento">ou em 10x de R$ 279,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
                <div class="product">
                    <img src="https://cdn.dlojavirtual.com/static1/102066/sku/thumb_moveis-guarda-roupas-beliche-havana-plus-3-gavetas-p-1693406633270.jpg"
                        alt="Produto 4">
                    <h3>Beliche Havana Plus 3 Gavetas</h3>
                    <p class="preco">R$ 1.499,00</p>
                    <p class="parcelamento">ou em 10x de R$ 144,90</p>
                    <span class="acrescimo">Acima de 5x sujeito a acréscimo.</span>
                </div>
            </div>
            <button class="next-btn">&#10095;</button>
        </div>
    </section>

    <div>
        <?php include '../tools/footer.html'; ?>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>