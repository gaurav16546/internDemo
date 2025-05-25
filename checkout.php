<?php
session_start();
include("database.php");

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please log in to checkout.'); window.location.href='login.php';</script>";
    exit();
}

$userId = $_SESSION['user_id'];


$delete = $mysqli->prepare("DELETE FROM cartlist WHERE userid = ?");
$delete->bind_param("i", $userId);

if ($delete->execute()) {
    echo "<script>alert('Checkout successful! Your order has been placed.'); window.location.href='viewproduct.php';</script>";
} else {
    echo "<script>alert('Checkout failed. Please try again.'); window.location.href='viewcart.php';</script>";
}

$delete->close();
$mysqli->close();
?>
