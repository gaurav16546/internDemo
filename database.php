<?php
$servername = "localhost";
$username = "root";
$database = "ecommerce";
$password = "";

$mysqli = new mysqli($servername,$username,$password,$database);

if($mysqli -> connect_errno){
    die("Connection failed: " .$conn -> connect_error);
}
