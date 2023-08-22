<?php
require("dbconn.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
     $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $query = "INSERT INTO users (first_name, last_name, username, email, password) VALUES('$first_name', '$last_name', '$username', '$email', '$password')";
    $results = mysqli_query($conn, $query);
    if ($results){
        header("Location:login.php");
    }

    header("Location: login.php");
    exit();
   
}
?>
