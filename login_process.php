<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db_host = "localhost";
    $db_username = "root";
    $db_password = "";
    $db_name = "ecommerce_db";

    $conn = new mysqli($db_host, $db_username, $db_password, $db_name);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Use prepared statements for security
    $stmt = $conn->prepare("SELECT user_id, username, password FROM users WHERE username = ?");
    if ($stmt === false) {
        die("Error in preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $username);
    if (!$stmt->execute()) {
        die("Error in executing statement: " . $stmt->error);
    }

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if (!$user) {
        die("User not found or incorrect password.");
    }

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['username'] = $username;

        // Debug lines
        var_dump($_SESSION);
        var_dump($user);

        header("Location: ui/index.php");
        exit();
    } else {
        header("Location: login.php?error=1");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
