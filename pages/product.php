<?php include("../layout/header.php") ;
include("../config/functions.php");

$product_id = $_GET['product_id'];
$user_id = $_SESSION['user_id'];


?>
<link rel="stylesheet" href="../css/product.css">


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
                <img src="../images/<?=$product['Image1'];?>" alt="Error" id="mainImage">
            </div>
            <div class="mini_img">
                <img src="../images/<?=$product['Image1'];?>" alt="" class="mini-image">
                <?php
                    if($product['Image2']!=null){        
                ?>
                <img src="../images/<?=$product['Image2'];?>" alt="" class="mini-image">
                <?php
                    }
                ?>
            </div>

        </div>

        <div class="r">
            <a href="Araqum.html">
                <p class="araqum">
                    Առաքում անվճար
                </p>
            </a>

            <p>
                Երևանում 1 օրում
                <br>
                Մարզերում 1-3 օրվա ընթացքում
            </p>
            <?php
            $sql = select('assortment',  1, '*', 1);
            $product = mysqli_fetch_assoc($sql);
?>
            <a href="<?php if(!$user_id){?>login.php<?php }else{?>../actions/addBasketAction.php?id=<?=$product_id;}?>">

                <button>
                    <b>
                        Ավելացնել&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-cart-shopping"></i>
                    </b>
                </button>
            </a>
            <a href="<?php if(!$user_id){?>login.php<?php }else{?>../actions/addSavedAction.php?id=<?=$product_id;}?>">
                <i class=" <?php if(!$user_id){ echo "fa-regular"; }
             else{
                $sqll = "SELECT * FROM `saved` WHERE Assortment_ID=$product_id AND User_ID=$user_id";
                $sqll = query($sqll);
                if ($product=mysqli_fetch_assoc($sqll)) {echo "fa-solid"; }
                else {  echo "fa-regular";}}
                ?> 
                fa-bookmark"></i>
            </a>

        </div>
    </div>
    <p class="description">
        <?php echo $product['Description']; ?>
    </p>


</section>

<script src="../js/script.js"></script>

<?php include("../layout/footer.php") ?>














































<!-- <!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Product Details - Electronics Store</title>
    <link rel="stylesheet" type="text/css" href="css/product.css">
</head>
<body>
     Header (as shown in previous examples) 

    <section class="product-details">
        <img src="product1.jpg" alt="Product 1">
        <h2>Product 1</h2>
        <p>Description of Product 1.</p>
        <p>Price: $199.99</p>
        <button>Add to Cart</button>
    </section>

     Footer (as shown in previous examples) 
</body>
</html>