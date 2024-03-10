<?php

include "../settings/connection.php";

function get_order_total_price($order_id) {
    global $conn;
    $sql = "SELECT Total_Price FROM Orders WHERE Order_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return $row['Total_Price'];
    } else {
        return null; // Order not found or empty result
    }
}
