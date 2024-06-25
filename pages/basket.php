<?php include("../layout/header.php");
    include("../config/functions.php");
    ?>
<link rel="stylesheet" href="../css/baske.css">
<section>
    <?php
    $user_id = $_SESSION["user_id"];
    if(!$user_id){
        header('Location:login.php');die;
    }
$sql = "SELECT * FROM basket INNER JOIN assortment ON basket.Assortment_ID=assortment.Assortment_ID WHERE basket.User_ID=$user_id;";
$sql = query($sql);
if (mysqli_num_rows($sql) == false) {
    echo  '<p> Ձեր զամյուղը դեռ դատարկ է։</p>';
}
   ?>
    <div class="left">
        <?php
        $sum=0;
while ($product = mysqli_fetch_assoc($sql)) {    
$sum=$sum+$product['Cash_price'];
        ?>

        <div class="product">
            <div class="img_div">
                <a href="product.php?product_id=<?=$product['Assortment_ID']?>">
                    <img src="../images/<?=$product['Image1']; ?>" alt="Error">
                </a>
            </div>
            <div class="info_div">
                <a href="product.php?product_id=<?=$product['Assortment_ID']?>">
                    <h5>
                        <?php echo $product['Description']; ?>
                    </h5>
                </a>
                <p>
                    Գին <?php echo $product['Cash_price']; ?> Դր.
                </p>
            </div>
            <div class="price_div">
                <div>
                    <p>Ընդամենը</p>
                    <p><?php echo $product['Cash_price'] * $product['Count']; ?> Դր.</p>
                </div>
                <div>
                    <p>Քանակ</p>
                    <!-- <form action="../actions/addBasketAction.php" method="get"> -->
                    <input type="number" value="<?=$product['Count']; ?>" min="1" name="count_product">
                    <!-- <input type="text" value="<?=$product['Assortment_ID']?>" style="display:none;" name="id_product"> -->
                    <a href="../actions/addBasketAction.php?id=<?=$product['Assortment_ID'];?>">
                        <button name="plus" id="plus" value="plus"><i class="fa-solid fa-plus"></i></button>

                    </a>

                    <?php
                    if ($product['Count'] > 1) {
                        
                    ?> <a href="../actions/addBasketAction.php?id=-<?=$product['Assortment_ID'];?>">
                        <button name="minus" id="minus" value="minus"><i class="fa-solid fa-minus"></i> </button>

                    </a>
                    <?php
                    }else{
                        
                    ?>
                    <button name="minus" id="minus" value="minus"><i class="fa-solid fa-minus"></i> </button>

                    <?php
                    }
                        
                    ?>
                    <!-- <button name="plus" id="plus" value="plus"><i class="fa-solid fa-plus"></i></button> -->
                    <!-- <button name="minus" id="minus" value="minus"><i class="fa-solid fa-minus"></i> </button> -->
                    <!-- </for> -->

                </div>
            </div>
            <div class="delete_product">
                <a href="../actions/deleteProduct.php?id=<?=$product['Assortment_ID']?>">
                    <i class="fa-solid fa-close"></i>
                </a>
            </div>
        </div>

        <?php
            }
            ?>
    </div>
    <div class="right">
        <div>
            <p>Ապրանքների արժեք</p>
            <p class="gin"><?php echo $sum;?> AMD</p>
        </div>
        <div>
            <p>Առաքման արժեք </p>
            <p class="gin">0 AMD</p>
        </div>
        <div>
            <p>Ընդհանուր արժեք</p>
            <p class="gin"> <?php echo $sum;?> AMD</p>
        </div>
        <div>
            <a href="../actions/deleteProduct.php?id=all">
                <p>Մաքրել զամբյուղը</p>
            </a>
        </div>
        <div>
            <a href="Tesakani.php">
                <p>Շարունակել գնումները</p>
            </a>
        </div>
        <div class="patver_btn">

            <?php
            if (mysqli_num_rows($sql) == false) {
                echo  '<p>Պատվիրել</p>';
            }else{?>

            <a href="../actions/buyAction.php">

                <p>Պատվիրել</p>
            </a>
            <?php } ?>
        </div>
    </div>
</section>
<?php include("../layout/footer.php") ?>