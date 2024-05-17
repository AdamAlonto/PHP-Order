<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.html');
    exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Gun Shop System</title>
</head>
<body>
    <h2>Welcome to Adam's Gun shop, <?php echo htmlspecialchars($username); ?>!</h2>
    <form method="post" action="receipt.php">
        <label>Gun 1: AK-47</label>
        <label>Price: &#8369;300</label><br><br>

        <label>Gun 2: Beretta</label>
        <label>Price: &#8369;100</label><br><br>

        <label>Gun 3: SKS</label>
        <label>Price: &#8369;250</label><br><br>

        <label>Gun 4: RPK-74</label>
        <label>Price: &#8369;400</label><br><br>

        <label for="quantity1">Quantity of Gun 1:</label>
        <input type="number" id="quantity1" name="quantity1" min="0" required><br><br>

        <label for="quantity2">Quantity of Gun 2:</label>
        <input type="number" id="quantity2" name="quantity2" min="0" required><br><br>

        <label for="quantity3">Quantity of Gun 3:</label>
        <input type="number" id="quantity3" name="quantity3" min="0" required><br><br>

        <label for="quantity4">Quantity of Gun 4:</label>
        <input type="number" id="quantity4" name="quantity4" min="0" required><br><br>

        <label for="cash">Amount of Cash:</label>
        <input type="number" id="cash" name="cash" required><br><br>

        <input type="submit" name="submit" value="Submit Order">
    </form>
</body>
</html>
