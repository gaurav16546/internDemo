<?php
session_start();
include("database.php");

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Please login first.'); window.location.href='login.php';</script>";
    exit();
}

$userId = $_SESSION['user_id'];

$query = "SELECT c.*, p.productname, p.price, p.image_path 
          FROM cartlist c 
          JOIN productlist p ON c.productid = p.productid 
          WHERE c.userid = ?";
$stmt = $mysqli->prepare($query);
$stmt->bind_param("i", $userId);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Cart</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 20px;
        }

        div {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            gap: 20px;
            margin: 20px;
        }

        .cart-item {
            width: 250px;
            background-color: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease-in-out;
        }

        .cart-item img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 10px;
        }

        .cart-item h3 {
            font-size: 18px;
            color: #333;
            margin-bottom: 10px;
        }

        .cart-item p {
            font-size: 16px;
            color: #555;
            margin: 5px 0;
        }

        .cart-item p:last-child {
            font-weight: bold;
            color: #0d8b8b;
        }

        .cart-item:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .checkout-btn {
            background-color:rgb(102, 207, 207);
            color: white;
            padding: 12px 25px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #0b6f6f;
        }
    </style>
</head>

<body>
    <?php
    include_once "header.php";
    if ($result->num_rows > 0) {
        echo "<div>";
        while ($row = $result->fetch_assoc()) {
            echo "<div class='cart-item'>";
            echo "<img src='" . $row["image_path"] . "' alt='product image'>";
            echo "<h3>" . htmlspecialchars($row["productname"]) . "</h3>";
            echo "<p>Price: Rs." . number_format($row["price"], 2) . "</p>";

            echo "<form action='deletecartitem.php' method='GET'>";
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            echo "<button type='submit' style='margin-top:10px; padding:6px 12px; background-color:#e63946; color:white; border:none; border-radius:4px; cursor:pointer;'>Delete</button>";
            echo "</form>";

            echo "</div>";
        }

        echo "</div>";
    } else {
        echo "<p>Your cart is empty.</p>";
    }

    $stmt->close();
    $mysqli->close();

    ?>
    <?php if ($result->num_rows > 0): ?>
        <form action="checkout.php" method="POST" style="text-align: center; margin-top: 30px;">
            <button type="submit" class="checkout-btn">Proceed to Checkout</button>
        </form>
    <?php endif;
        include_once "footer.php"; ?>

</body>

</html>