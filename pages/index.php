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

    <div>
        <?php include '../php/vitrine.php'; ?>
    </div>

    <div>
        <?php include '../tools/footer.html'; ?>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>