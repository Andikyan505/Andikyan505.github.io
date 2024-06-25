<?php
session_start();
include("../../config/functions.php");

$user_id = $_SESSION['user_id'];
$product_id = $_GET['id'];

$data = [
    "Assortment_ID" => $product_id
];


$isDeleted1 =  del('basket', $data);
$isDeleted2 =  del('saved', $data);
$isDeleted3 =  del('assortment', $data);
if ($isDeleted1 and $isDeleted2 and $isDeleted3) {
    header('Location:../index.php');
    die;
}