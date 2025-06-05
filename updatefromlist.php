<?php
session_start();
include("database.php");
if (!isset($_SESSION["user_id"])) {
    echo "<script>alert('You need to login first.'); window.location.href='login.html';</script>";
    exit();
}
$userId = $_SESSION['user_id'];
$productId = $_POST['product_id'];
$productname = $_POST['productname'];
$productprice = $_POST['price'];

var_dump(empty($productname));
var_dump(empty($productprice));

if (empty($productname) && empty($productprice)) {
    echo '<script>alert("no changes.");window.location.href="viewproduct.php";</script>';
    exit();

} else if (!empty($productname) && !empty($productprice)) {
    $stmt = $mysqli->prepare('Update productlist Set productname = ? , price = ? where productid = ?');
    $stmt->bind_param('sii', $productname, $productprice,$productId);

} else if (!empty($productname) && empty($productprice)) {
    $stmt = $mysqli->prepare('Update productlist Set productname = ? where productid = ?');
    $stmt->bind_param('si', $productname,$productId);

} else if (empty($productname) && !empty($productprice)) {
    $stmt = $mysqli->prepare('Update productlist Set price = ? where productid = ?');
    $stmt->bind_param('ii', $productprice,$productId);

}


if ($stmt->execute()) {
    echo "<script>alert('Information updated successfully');window.location.href='viewproduct.php'</script>";
} else {
    echo "<script>alert('Unable to update info successfully');
    window.location.href='viewproduct.php'</script>";
}
