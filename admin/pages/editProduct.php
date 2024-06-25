<?php
include("../../config/functions.php");
// $id = $_GET['id'];

$product_id = $_POST['product_id'];
$group_id = $_POST['group_id'];
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
    <link rel="stylesheet" href="../../css/regist.css">
    <title>Document</title>
    </shead>

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

    <!-- value=" -->
    <?php
$data=[
    "Assortment_ID" => $product_id
];
$sql = select('assortment',  $data, '*', 1);
$product = mysqli_fetch_assoc($sql);
  
?>
    <form action="../action/editProductAction.php" method="post" enctype="multipart/form-data">
        <label class="file-lable" for="file">Ընտրեք նկար</label>
        <input class="form-control" id="file" type="file" name="productImage[]" multiple style="display:none;">
        <input class="form-control" type="text" name="name" placeholder="name" value="<?=$product['Name ']?>">
        <input class="form-control" type="number" name="price" placeholder="price" value="<?=$product['Cash_price']?>">
        <input class="form-control" type="text" name="parametr1" placeholder="parametr1"
            value="<?=$product['Parametr_1']?>">
        <input class="form-control" type="date" name="guarante" placeholder="guarante"
            value="<?=$product['Guarante']?>">
        <input class="form-control" type="text" name="model" placeholder="model" value="<?=$product['Model']?>">
        <input class="form-control" type="text" name="tesak" placeholder="tesak" value="<?=$product['Tesak']?>">
        <input class="form-control" type="text" name="description" placeholder="description"
            value="<?=$product['Description']?>">
        <input class="form-control" type="hidden" name="group_id" placeholder="goup_id" value="<?=$group_id?>">
        <input class=" form-control" type="hidden" name="product_id" placeholder="product_id" value="<?=$product_id?>">
        <button type="submit" value="Edit Productd" class="btn btn-success btn-lg btn-block">
            Edit
        </button>
    </form>