<?php
session_start();
// require_once("../config/config.php");
// include("../../config/functions.php");
include ("../../config/functions.php");

     
$product_id = $_POST['product_id'];
$name = $price=$parametr1=$guarante=$model=$tesak=$group_id=$description=$Image1=$Image2 = null;


if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
    // $data =[
    //     'Name'=>$name
    // ];
}
if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price = $_POST['price'];
    // $data =[
    //     'Cash_price'=>$price
    // ];
}
if (isset($_POST['parametr1']) && !empty($_POST['parametr1'])) {
    $parametr1 = $_POST['parametr1'];
    // $data =[
    //     'Parametr_1'=>$parametr1
    // ];
}
if (isset($_POST['guarante']) && !empty($_POST['guarante'])) {
    $guarante = $_POST['guarante'];
    // $data =[
    //     'Guarante'=>$guarante
    // ];
}
if (isset($_POST['model']) && !empty($_POST['model'])) {
    $model = $_POST['model'];
    // $data =[
    //     'Model'=>$model
    // ];
}
if (isset($_POST['tesak']) && !empty($_POST['tesak'])) {
    $tesak = $_POST['tesak'];
    // $data =[
    //     'Tesak'=>$tesak
    // ];
}
if (isset($_POST['group_id']) && !empty($_POST['group_id'])) {
    $group_id = $_POST['group_id'];
    // $data =[
    //     'Group_ID'=>$group_id
    // ];
}
if (isset($_POST['description']) && !empty($_POST['description'])) {
    $description = $_POST['description'];
    // $data =[
        // 'Description'=>$description
    // ];
}
if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
    $data =[
        'Name'=>$name
    ];
}
if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price = $_POST['price'];
    $data =[
        'Cash_price'=>$price
    ];
}
if (isset($_POST['parametr1']) && !empty($_POST['parametr1'])) {
    $parametr1 = $_POST['parametr1'];
    $data =[
        'Parametr_1'=>$parametr1
    ];
}
if (isset($_POST['guarante']) && !empty($_POST['guarante'])) {
    $guarante = $_POST['guarante'];
    $data =[
        'Guarante'=>$guarante
    ];
}
if (isset($_POST['model']) && !empty($_POST['model'])) {
    $model = $_POST['model'];
    $data =[
        'Model'=>$model
    ];
}
if (isset($_POST['tesak']) && !empty($_POST['tesak'])) {
    $tesak = $_POST['tesak'];
    $data =[
        'Tesak'=>$tesak
    ];
}
if (isset($_POST['group_id']) && !empty($_POST['group_id'])) {
    $group_id = $_POST['group_id'];
    $data =[
        'Group_ID'=>$group_id
    ];
}
if (isset($_POST['description']) && !empty($_POST['description'])) {
    $description = $_POST['description'];
    $data =[
        'Description'=>$description
    ];
}
if (isset($_POST['productImage1']) && !empty($_POST['productImage1'])) {
    $image1 = $_POST['productImage1'];
    // $data =[
    //     'Name'=>$name
    // ];
}
if (isset($_POST['productImage2']) && !empty($_POST['productImage2'])) {
    $image2 = $_POST['productImage2'];
    // $data =[
    //     'Name'=>$name
    // ];
}

$target_dir = "../../images/";
$arr = [];
$x = 0;
        foreach ($_FILES['productImage']['name'] as $i => $productImage) {
            $fileName = uniqid() . '-' . basename($productImage);
            $target_file = $target_dir . $fileName;
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"][$i], $target_file)) {
                $arr[$x] = $fileName;
                $x+=1;
            }
        }
        $Image1=$arr[0];
        $Image2=$arr[1];
$data = [
    'Name'=>$name,
    'Cash_price'=>$price,
    'Parametr_1'=>$parametr1,
    'Guarante'=>$guarante,
    'Model'=>$model,
    'Tesak'=>$tesak,
    'Group_ID'=>$group_id,
    'Description'=>$description,
    'Image1'=>$Image1,
    'Image2'=>$Image2
];

$where = [
    'Assortment_ID' => $product_id
];

$productUpdated = edit('assortment',$data,$where);
// var_dump($userUpdated);die;
if($productUpdated) {
    header("Location:../index.php");die;
}
else{
    header("Location:");die;
}