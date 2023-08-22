<?php


require_once("dbconn.php");
session_start();
if (!isset($_SESSION['username'])) {
   header("Location: ../login.php");
   exit();
}
$user_id = $_SESSION['user_id'];

if (isset($_GET['ID'])){
    $product_id = $_GET['ID'];
    
}


$query = "INSERT INTO cartitems(cart_id, product_id) VALUES ('$user_id','$product_id')";
$result = mysqli_query($conn, $query);


// I can add an if here says Roy


?>