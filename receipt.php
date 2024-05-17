<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

$username = $_SESSION['username'];

if (isset($_POST['submit'])) {
    $quantity1 = $_POST['quantity1'];
    $quantity2 = $_POST['quantity2'];
    $quantity3 = $_POST['quantity3'];
    $quantity4 = $_POST['quantity4'];
    $price1 = 300;
    $price2 = 100;
    $price3 = 250;
    $price4 = 400;
    $cash = $_POST['cash'];

    $total_cost = ($quantity1 * $price1) + ($quantity2 * $price2) + ($quantity3 * $price3) + ($quantity4 * $price4);

    $change = $cash - $total_cost;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
</head>
<body>
    <h2>Receipt</h2>
    <?php
    echo "<h3>Order Summary:</h3>";
    echo "Total Cost: &#8369;" . $total_cost . "<br>";
    if ($change >= 0) {
        echo "Change: &#8369;" . $change . "<br>";
        echo "Thanks for the order, " . htmlspecialchars($username) . "!";
    } else {
        echo "Insufficient funds! Please add more cash.";
    }
    ?>
</body>
</html>
