<?php 
include("../../config/functions.php");

$product_id = $_GET['product_id'];


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../../css/product.css">

    <title>Document</title>
</head>

<header>
    <nav>
        <ul>
            <li><a href="../index.php">Տեսականի</a></li>
            <li><a href="done.php">կատրած պատվերներ </a></li>
            <li><a href="wait.php">կատարման ենթակա պատվերներ</a></li>
            <li><a href="addProduct.php">Ավելացնել նոր ապրանք</a></li>
        </ul>
    </nav>
    <a href="../../actions/logoutAction.php" class="logout">
        <i class=" fa-solid fa-right-from-bracket"></i>
    </a>
</header>


<body>
    <section>
        <h2>
            Վինիլային պաստառ
        </h2>
        <?php
    $date=[
        'Assortment_ID'=>$product_id
    ];
    $sql = select('assortment', $date, '*', 1);
    $product = mysqli_fetch_assoc($sql);   
    ?>
        <div class="rl">
            <div class="l">


                <div class="img_div">
                    <img src="../../images/<?=$product['Image1'];?>" alt="Error" id="mainImage">
                </div>
                <div class="mini_img">
                    <img src="../../images/<?=$product['Image1'];?>" alt="" class="mini-image">
                    <?php
                    if($product['Image2']!=null){        
                ?>
                    <img src="../../images/<?=$product['Image2'];?>" alt="" class="mini-image">
                    <?php
                    }
                ?>
                </div>

            </div>

            <div class="r">
                <ul>
                    <li><?=$product['Name'];?></li>
                    <li><?=$product['Cash_price'];?> դրամ</li>
                    <li><?=$product['Parametr_1'];?></li>
                    <li><?=$product['Guarante'];?></li>
                    <li><?=$product['Model'];?></li>
                    <li><?=$product['Tesak'];?></li>
                </ul>
            </div>
        </div>
        <p class="description">
            <?=$product['Description'];?>
        </p>

    </section>
    <script src="../../js/script.js"></script>

</body>

</html>