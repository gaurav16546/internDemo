<?php
include_once "database.php";

// $sql = "INSERT INTO productlist(productname,price) VALUES('$productname','$price')";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $image = $_FILES['image'];
    $productname = $_POST['productname'];
    $price = $_POST['price'];


    $target_dir = "images/";
    $target_file = $target_dir . basename($image["name"]);

    if (move_uploaded_file($image["tmp_name"], $target_file)) {
        $sql = "INSERT INTO productlist (productname,price,image_path) VALUES ('$productname','$price','$target_file')";

        if ($mysqli->query($sql) === TRUE) {
            header("Location:viewproduct.php");
            exit();
        } else {
            echo "Error: " . $mysqli->error;
        }
    } else {
        echo "Failed to upload image.";
    }
}

// if ($result = $mysqli->query($sql)) {
//     header("Location: viewproduct.php");
//     exit;
// } else {
//     echo "Could not insert record: ";
// }

$mysqli->close();
