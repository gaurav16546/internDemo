<?php
session_start();
include("database.php");

if(!isset($_SESSION["user_id"])){
       echo "<script>alert('You need to login first.'); window.location.href='login.html';</script>";
       exit();
}

$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];

$stmt = $mysqli -> prepare("Delete from productlist where productid = ?");
$stmt->bind_param("i", $productId);

if($stmt->execute()){
    echo "<script>alert('Product Delete successfully.'); window.location.href='viewproduct.php';</script>";
}else{
    echo "<script>alert('Unable to delete product successfully.'); window.location.href='viewproduct.php';</script>";
}

