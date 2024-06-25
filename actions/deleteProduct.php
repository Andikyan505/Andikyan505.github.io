<?php
session_start();
// include("../config/config.php");
include("../config/functions.php");

// $id = $_GET["id"];
$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];
if ($product_id == "all") {
    $data = [
        "User_ID" => $user_id,
    ];
}
else {      
    $data = [
        "User_ID" => $user_id,
        "Assortment_ID" => $product_id
    ];
}


$isDeleted =  del('basket', $data);
// var_dump($isDeleted);die;
if ($isDeleted) {
    header('Location:../pages/basket.php');
    die;
}