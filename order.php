<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flower_id = $_POST['flower_id'];
    $quantity = $_POST['quantity'];

    $flower_query = "SELECT price FROM flowers WHERE id = $flower_id";
    $flower_result = $conn->query($flower_query);
    $flower = $flower_result->fetch_assoc();

    $total_price = $flower['price'] * $quantity;

    $order_query = "INSERT INTO orders (flower_id, quantity, total_price) VALUES ($flower_id, $quantity, $total_price)";
    if ($conn->query($order_query)) {

        echo "
        <br><br><br><br><br><br><br><br>
        <body bgcolor='aqua'>
        <h1 align='center'> Order Placed Successfully! Total Price: ₹" . $total_price;
        "</h1>
        </body>";

    } else {
        echo "Error: " . $conn->error;
    }
}
?>
<br><br>
<a href="login.php" align="center">Back to Shop</a>
