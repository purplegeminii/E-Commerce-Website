<?php

session_start();
include "../settings/connection.php";
global $conn;

if (isset($_SESSION['order_id'])) {
    $order_id = $_SESSION['order_id'];

    $sql = "UPDATE Orders SET Status = 'Cancelled', Payment_Status = 'Cancelled' WHERE Order_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);

    if ($stmt->execute()) {
        echo "Order canceled successfully!";
    } else {
        // Error occurred during order cancellation
        echo "Error canceling the order: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "No active order to cancel.";
}
