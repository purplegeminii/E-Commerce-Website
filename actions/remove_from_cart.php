<?php

include "../settings/connection.php";

$order_item_id = $_GET['order_item_id'];

function remove_item_from_cart ($order_item_id): bool {
    global $conn;
    $sql = "DELETE FROM Order_Items WHERE Order_Item_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_item_id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

if (remove_item_from_cart($order_item_id)) {
    header("Location: ../view/cart.php");
} else {
    echo "Error: could not remove item from cart";
}
