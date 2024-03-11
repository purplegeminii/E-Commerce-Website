<?php

include "../settings/connection.php";

$order_item_id = $_GET['order_item_id'];
$action = $_GET['action'];
$current_qty = $_GET['qty'];

function update_quantity($order_item_id, $quantity): bool {
    global $conn;

    $sql = "UPDATE Order_Items SET Quantity = ? WHERE Order_Item_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $quantity, $order_item_id);
    $stmt->execute();

    return $stmt->affected_rows > 0;
}

if ($action == "minus") {
    $new_qty = $current_qty - 1;
    if (update_quantity($order_item_id, $new_qty)) {
        header("location: ../view/cart.php");
    } else {
        echo "error";
    }
} else if ($action == "plus") {
    $new_qty = $current_qty + 1;
    if (update_quantity($order_item_id, $new_qty)) {
        header("location: ../view/cart.php");
    } else {
        echo "error";
    }
} else {
    echo "invalid action";
}
