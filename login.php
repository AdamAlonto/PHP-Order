<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to mySQL
    $conn = new mysqli('localhost', 'root', '', 'gunshop');

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Verify the users credentials? ewan
    $stmt = $conn->prepare("SELECT Password FROM customers WHERE Username = ?");
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    if ($stmt->num_rows > 0 && password_verify($password, $hashed_password)) {
        $_SESSION['username'] = $username;
        header('Location: shop.php');
        exit();
    } else {
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>
