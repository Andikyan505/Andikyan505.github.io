<?php
session_start();
include("../config/functions.php");
// var_dump($_SESSION['user_id']);
$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];



// $sql = "SELECT * FROM basket wher;";

// $sql = "SELECT * FROM `basket` WHERE User_ID=$user_id AND Assortment_ID=$product_id";
// $sql = query($sql);

// var_dump($sql);die;
$sql = "SELECT * FROM `saved` WHERE User_ID=$user_id AND Assortment_ID=$product_id";
$sql = query($sql);

// $product = mysqli_fetch_assoc($sql);
// var_dump($product);die;

// UPDATE `basket` SET `Count` = '3' WHERE `Assortment_ID`=2 AND `User_ID`=1
if ($product = mysqli_fetch_assoc($sql)) {
    
$data_where = [
    "Assortment_ID" => $product_id,
    "User_ID" => $user_id
];
$deleted = del('saved',$data_where);

    
    // var_dump($added);die;
    // $sql = "UPDATE `$basket` SET $fields WHERE $condition";
    // return query($sql);
    if ($deleted) {
    header("Location:../pages/tesakani.php");
    }
    
}else {
    
$data = [
    "Assortment_ID" => $product_id,
    "User_ID" => $user_id
    ];
    
    $added = create('saved',$data);
    // var_dump($added);die;
    if ($added) {
    header("Location:../pages/tesakani.php");
    }
    
    
    
}

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