<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $file = 'users.txt';
    $handle = fopen($file, 'r');
    $authenticated = false;

    while (($line = fgets($handle)) !== false) {
        list($stored_username, $stored_password) = explode(',', trim($line));
        if ($username == $stored_username && password_verify($password, $stored_password)) {
            $authenticated = true;
            break;
        }
    }
    fclose($handle);

    if ($authenticated) {
        $_SESSION['username'] = $username;
        header('Location: shop.php');
        exit();
    } else {
        echo 'Invalid username or password.';
    }
}
?>
