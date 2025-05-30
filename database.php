<?php
$servername = "localhost";
$username = "gaurav";
$database = "ecommerce";
$password = "Gaurav1.";

$mysqli = new mysqli($servername,$username,$password,$database);

if($mysqli -> connect_errno){
    die("Connection failed: " .$conn -> connect_error);
}
