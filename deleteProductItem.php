<?php
include("database.php");

if(isset($_POST['product_id'])){
    $product_id =$_POST['product_id'];
    $query = "DELETE FROM  productlist where id = $product_id";
    if($result = $mysqli -> query($query)){
        echo "This product has been deleted.";
    }else{
        echo "Unable to delete this product.";
    }
}
$mysqli -> close();