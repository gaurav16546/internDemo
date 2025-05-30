<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            min-height: 100vh;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 30px;
            width: 100%;
            max-width: 1200px;
            padding: 20px;
            box-sizing: border-box;
        }

        .product-card {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: contain;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .product-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .product-name {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .product-price {
            font-size: 16px;
            color: #e60000;
            margin-bottom: 15px;
        }

        .add-to-cart-btn {
            background-color: #ffa500;
            color: white;
            font-size: 16px;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }

        .add-to-cart-btn:hover {
            background-color: #ff7a00;
        }

        .upload-link {
            text-decoration: none;
            background-color: #4CAF50;
            color: white;
            height: 67px;
            padding: 18px 27px;
            margin-top: 28px;
            font-size: 16px;
            border-radius: 5px;
            text-align: center;
            display: block;
        }

        .upload-link:hover {
            background-color: #45a049;
        }

        .upload-link:active {
            background-color: #3e8e41;
        }
    </style>
</head>

<body>
    <?php
    include_once "database.php";
    include_once "header.php";
    $sql = "SELECT * FROM productlist";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="product-container">
            <?php
            while ($row = $result->fetch_assoc()) {
            ?>
                <div class="product-card">
                    <img src="<?php echo $row["image_path"] ?>" alt="product image" class="product-image">
                    <div class="product-info">
                        <div class="product-name"><?php echo $row["productname"] ?></div>
                        <div class="product-price">Rs.<?php echo $row["price"] ?></div>
                    </div>
                    <form action="addtocart.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $row["productid"]; ?>">
                        <button class="add-to-cart-btn" type="submit">Add to Cart</button>
                    </form>
                    <!-- <button class="add-to-cart-btn">Add to Cart</button> -->
                </div>
            <?php
            }
            ?>
        </div>

        <!-- <a href="viewcart.php" class="upload-link">Show my cart</a> -->
    <?php
    } else {
        echo "No records has been found";
    }
    $mysqli->close();
    ?>
    <a href="productForm.php" class="upload-link">Upload new product</a>
    <?php
    include_once "footer.php";

    ?>
</body>

</html>