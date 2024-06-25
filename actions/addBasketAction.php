<?php
session_start();
include("../config/functions.php");
// var_dump($_SESSION['user_id']);
$user_id = $_SESSION['user_id'];
// $product_id = $_GET['id'];

// if (isset($_POST['plus'])) {
//     $product_id = $_POST['id_product'];
//     $sql = "SELECT * FROM `basket` WHERE User_ID=$user_id AND Assortment_ID=$product_id";
//     $sql = query($sql);

//     if ($product = mysqli_fetch_assoc($sql)) {
//         $a = $product['Count']+1;
//         // var_dump($a);die;
//     $data = [
//         "Count" => $a
//     ];

//     $data_where = [
//         "Assortment_ID" => $product_id,
//         "User_ID" => $user_id
//     ];
        
//         $edited = edit('basket',$data,$data_where);
//         // var_dump($added);die;
//         // $sql = "UPDATE `$basket` SET $fields WHERE $condition";
//         // return query($sql);
//         if ($edited) {
//         header("Location:../pages/basket.php");
//         }
        
//     }
// }elseif (isset($_POST['minus'])) {
//     $product_id = $_POST['id_product'];
//     $sql = "SELECT * FROM `basket` WHERE User_ID=$user_id AND Assortment_ID=$product_id";
//     $sql = query($sql);
//     if ($product = mysqli_fetch_assoc($sql)) {
//     if($product['Count'] > 1){
//             $a = $product['Count']-1;
//         // var_dump($a);die;
//     }
//     $data = [
//         "Count" => $a
//     ];

//     $data_where = [
//         "Assortment_ID" => $product_id,
//         "User_ID" => $user_id
//     ];
        
//         $edited = edit('basket',$data,$data_where);
//         // var_dump($added);die;
//         // $sql = "UPDATE `$basket` SET $fields WHERE $condition";
//         // return query($sql);
//         if ($edited) {
//         header("Location:../pages/basket.php");die;
//         }
        
//     }
// }
// elseif($product_id = $_GET['id']){
    $product_id = $_GET['id'];
    if ($product_id < 0) {
        $sign = -1;
    }else{
        $sign = 1;
    }
    // $sql = "SELECT * FROM basket wher;";
    $product_id = abs($product_id);
    $sql = "SELECT * FROM `basket` WHERE User_ID=$user_id AND Assortment_ID= $product_id";
    // var_dump($sql);die;
   
    $sql = query($sql);

    // $product = mysqli_fetch_assoc($sql);
    // var_dump($product);die;

    // UPDATE `basket` SET `Count` = '3' WHERE `Assortment_ID`=2 AND `User_ID`=1
    if ($product = mysqli_fetch_assoc($sql)) {
        $a = $product['Count']+ $sign;
        // var_dump($a);die;
    $data = [
        "Count" => $a
    ];

    $data_where = [
        "Assortment_ID" => $product_id,
        "User_ID" => $user_id
    ];
        
        $edited = edit('basket',$data,$data_where);
        // var_dump($added);die;
        // $sql = "UPDATE `$basket` SET $fields WHERE $condition";
        // return query($sql);
        if ($edited) {
        header("Location:../pages/basket.php");die;
        }
        
    }else {
        
    $data = [
        "Assortment_ID" => $product_id,
        "User_ID" => $user_id,
        "Count" => 1,
        ];
        
        $added = create('basket',$data);
        // var_dump($added);die;
        if ($added) {
        header("Location:../pages/tesakani.php");die;
        }
        
        
        
    }

// }
// while ($product = mysqli_fetch_assoc($sql)) {
//     if ($product['User_ID']) {
        
//     }
//  }






// else {

// }
// if(!$user_id){

// }else{$product['Assortment_ID'];}

// if (!empty($_POST["post"]) || !empty($_FILES['postImage']['name'])) {
// $post = $_POST["post"];
// $user_id = $_SESSION["user_id"];
// $dataPost = [
// "user_id" => $user_id,
// "post" => $post,
// ];
// $postAdded = create('posts',$dataPost);


// if ($postAdded) {

// $where_data = [
// "user_id" => $user_id,
// ];

// $result=select('posts',$where_data);

// while ($lastPost = mysqli_fetch_assoc($result)){
// $post_id = $lastPost['id'];

// }
// $target_dir = "../uploads/media/";
// foreach ($_FILES['postImage']['name'] as $i => $postImage) {
// $fileName = uniqid() . '-' . basename($postImage);
// $target_file = $target_dir . $fileName;
// if (move_uploaded_file($_FILES["postImage"]["tmp_name"][$i], $target_file)) {
// $dataPost = [
// "post_id" => $post_id,
// "file" => $fileName,
// ];
// $postMediaUploaded = create('post_media',$dataPost);
// }
// }
// header("Location:../pages/posts.php");
// }
// }