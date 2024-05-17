<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $file = 'users.txt';
    $handle = fopen($file, 'a');
    fwrite($handle, $username . ',' . $password . "\n");
    fclose($handle);

    header('Location: login.html');
    exit();
}
?>
