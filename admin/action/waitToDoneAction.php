<?php
session_start();
include ("../../config/functions.php");

     
$id = $_GET['id'];
$data = [
    'Ordered'=>true
];
$where = [
    'Admin_Basket_ID' => $id
];

$Updated = edit('admin_basket',$data,$where);
if($Updated) {
    header("Location:../pages/wait.php");die;
}
else{
    header("Location:");die;
}