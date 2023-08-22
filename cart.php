<?php 


require_once("../dbconn.php");
$query = "SELECT * FROM cartitems WHERE cart_id = $cart_id";
$result = mysqli_query($conn, $query);


?>