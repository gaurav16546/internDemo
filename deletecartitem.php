<?php
session_start();
include("database.php");

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first.'); window.location.href='login.php';</script>";
    exit();
}

$userId = $_SESSION['user_id'];
$cartItemId = $_GET['id'];

$stmt = $mysqli->prepare("DELETE FROM cartlist WHERE id = ? AND userid = ?");
$stmt->bind_param("ii", $cartItemId, $userId);
$stmt->execute();
$stmt->close();
$mysqli->close();

echo "<script>alert('Item removed from cart.'); window.location.href='viewcart.php';</script>";
?>
