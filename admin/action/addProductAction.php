<?php
session_start();
include("../../config/functions.php");

     
// $product_id = $_POST['product_id'];

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
    //     'Description'=>$description
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
        if ($x == 2) {
            break;
        }
    }
}
// $data = [
    $Image1 = $arr[0];
    $Image2 = $arr[1];
// ];
$data = [
    'Name'=>$name,
    'Cash_price'=>$price,
    'Parametr_1'=>$parametr1,
    'Guarante'=>$guarante,
    'Model'=>$model,
    'Tesak'=>$tesak,
    'Group_ID'=>$group_id,
    'Description'=>$description,
    'Image1' => $Image1,
    'Image2' => $Image2
];
var_dump($data);

// $where = [
//     'id' => $product_id
// ];

$productAdded = create('assortment',$data);
// var_dump($userUpdated);die;
if($productAdded) {
    header("Location:../index.php");die;
}
else{
    header("Location:../pages/editProfile.php");die;
}



//     if (!empty($_POST["name"]) || !empty($_FILES['postImage']['name'])) {
//     $post = $_POST["post"];
//     $user_id = $_SESSION["user_id"];
//     $dataPost = [
//         "user_id" => $user_id,
//         "post" => $post,
//     ];
//     $postAdded = create('posts',$dataPost);


//     if ($postAdded) {

//         $where_data = [
//           "user_id" => $user_id,
//         ];

//         $result=select('posts',$where_data);

//         while ($lastPost = mysqli_fetch_assoc($result)){
//             $post_id = $lastPost['id'];

//         }
//         $target_dir = "../uploads/media/";
//         foreach ($_FILES['postImage']['name'] as $i => $postImage) {
//             $fileName = uniqid() . '-' . basename($postImage);
//             $target_file = $target_dir . $fileName;
//             if (move_uploaded_file($_FILES["postImage"]["tmp_name"][$i], $target_file)) {
//                 $dataPost = [
//                     "post_id" => $post_id,
//                     "file" => $fileName,
//                 ];
//                 $postMediaUploaded = create('post_media',$dataPost);
//             }
//         }
//         header("Location:../pages/posts.php");
//     }
// }