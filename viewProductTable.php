<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    
</head>

<body>
    <?php
    include_once "database.php";
    $sql = "SELECT * FROM productlist";
    $result = $mysqli->query($sql);
    if ($result->num_rows > 0) {
    ?>
        <div class="product-container">
             <table border="1p solid red">
             <th>ID:</th>
             <th>Product Name:</th>
             <th>Price:</th>
             <th>Image:</th>
             <?php
             while ($row = $result->fetch_assoc()) {
             ?>
                 <tr>
                     <td><?php echo $row["id"] ?></td>
                     <td><?php echo $row["productname"] ?></td>
                     <td><?php echo  $row["price"] ?></td>
                     <td><?php echo  $row["image_path"] ?></td>
                     <td><form action="deleteProductItem.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $row["id"]; ?>">
                        <button class="add-to-cart-btn" type="submit">Delete</button>
                    </form></td>
                 </tr>

         <?php
            }
            ?>
        </div>
        
        <a href="productForm.php" class="upload-link">Upload new product</a><br>
        <a href="viewcart.php" class="upload-link">Show my cart</a>
    <?php
    } else {
        echo "No records has been found";
    }

    $mysqli->close();
    ?>
</body>

</html>