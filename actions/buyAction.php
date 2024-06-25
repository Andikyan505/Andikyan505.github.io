<?php
session_start();
include("../config/functions.php");
$user_id = $_SESSION['user_id'];

$data_where = [
    "User_ID" => $user_id
];

$sql = select('basket',$data_where,'*');
while ($row = mysqli_fetch_assoc($sql)) {
    $data = [
        "Assortment_ID" => $row['Assortment_ID'],
        "User_ID" => $row['User_ID'],
        "Count" => $row['Count'],
        "Basket_ID" => $row['Basket_ID'],
        "Ordered" => false
    ];
    $create = create('admin_basket',$data);
    if ($create) {   
        echo "<script>alert('Պատվերը հաջողությամբ կատարվել է!'); window.location = '../pages/basket.php';</script>";
        // header("Location:../pages/basket.php");
    }
}


// $data = [
//     "Assortment_ID" => $row['Assortment_ID'],
//     "User_ID" => $user_id,
//     "Count" => $row['Count'],
//     "Basket_ID" => $row['Bsket_ID'],
//     "Ordered" => false

// ];
// $data_where = [
//     "User_ID" => $user_id
// ];
// $edited = edit('admin_basket',$data,$data_where);
// if ($edited) {   
//      echo "<script>alert('Պատվերը հաջողությամբ կատարվել է!'); window.location = '../pages/basket.php';</script>";
//     // header("Location:../pages/basket.php");

// }