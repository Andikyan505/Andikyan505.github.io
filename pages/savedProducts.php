<?php
session_start();
include("../layout/header.php");
include("../config/functions.php");
$products_group = $_GET['Group'];
$products_tesak = $_GET['Tesak'];
$user_id = $_SESSION['user_id'];
?>
<link rel="stylesheet" href="../css/tesakani.css">

<main>

    <?php
        $sql = "SELECT * FROM saved INNER JOIN assortment ON saved.Assortment_ID=assortment.Assortment_ID WHERE saved.User_ID ='$user_id';";
        $sql = query($sql);
        if (mysqli_num_rows($sql) == false) {
            echo  '<p> Այս բաժնում ներկա պահին ապրանքներ առկա չեն։</p>';
     }
    while ($product = mysqli_fetch_assoc($sql)) { ?>
    <article class="product">
        <div class="product_img">
            <a href="product.php?product_id=<?=$product['Assortment_ID']?>">
                <img src="../images/<?=$product['Image1']; ?>" alt="">
            </a>
        </div>
        <p>
            <?php echo $product['Name']; ?>
        </p>
        <p class=" price">
            <?php echo $product['Cash_price']; ?> AMD
        </p>
        <a
            href="<?php if(!$user_id){?>login.php<?php }else{?>../actions/addBasketAction.php?id=<?=$product['Assortment_ID'];}?>">

            <button>
                <b>
                    Ավելացնել&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa-solid fa-cart-shopping"></i>
                </b>
            </button>
        </a>
        <a
            href="<?php if(!$user_id){?>login.php<?php }else{?>../actions/addSavedAction.php?id=<?=$product['Assortment_ID'];}?>">
            <i class="<?php $product_id=$product['Assortment_ID'];
            $sqll = "SELECT * FROM `saved` WHERE Assortment_ID=$product_id";
            $sqll = query($sqll);
            if ($product=mysqli_fetch_assoc($sqll)) {echo "fa-solid"; }
            else {  echo "fa-regular";}?> 
                fa-bookmark"></i>
        </a>
    </article>
    <?php
        }

    ?>
</main>

<?php include("../layout/footer.php") ?>