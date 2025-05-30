<?php
session_start();
include "database.php";
$varible = 1;
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('You need to login first.'); window.location.href='login.php';</script>";
    exit();
}

$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];

// Check if product already in cart
$stmt = $mysqli->prepare("SELECT id FROM cartlist WHERE productid = ? AND userid = ?");
$stmt->bind_param("ii", $productId, $userId);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $varible = 0;

} else {
    // Insert new cart item
    $insert = $mysqli->prepare("INSERT INTO cartlist (productid,userid ) VALUES (?, ?)");
    $insert->bind_param("ii", $productId, $userId);
    $insert->execute();
    $insert->close();
}

$stmt->close();
$mysqli->close();
if($varible === 1 ){
echo "<script>alert('Product added to cart!'); window.location.href='viewproduct.php';</script>";
}
echo "<script>alert('Product already exitst');window.location.href='viewproduct.php';</script>";
?>
