<?php 
require_once("dbconn.php");
$query = "SELECT * FROM users";
$result = mysqli_query($conn, $query);

while ($row = mysqli_fetch_assoc($result)){
    $user_id = $row['user_id'];
    $query2= "INSERT INTO carts(user_id) VALUES ('$user_id')";
$result2 = mysqli_query($conn, $query2);
}

header("Location: ui/index.php");




?>
