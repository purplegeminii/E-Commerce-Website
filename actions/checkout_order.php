<?php

session_start();
include "../settings/connection.php";
global $conn;

$orderId = $_GET['order_id'];
var_dump($orderId);

$sql = "UPDATE Orders SET Status = 'Confirmed' WHERE Order_ID = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $orderId);
$stmt->execute();

if ($stmt->affected_rows > 0) {
    header("Location: ../view/checkout.php");
} else {
    echo "Error: could not update order status";
    echo mysqli_error($conn);
}

mysqli_stmt_free_result($stmt);
mysqli_close($conn);
