<?php

include "../settings/connection.php";

$order_item_id = $_GET['order_item_id'];
$action = $_GET['action'];
$current_qty = $_GET['qty'];

function update_quantity($order_item_id, $quantity): bool {
    global $conn;

    // Fetch the current price of the item
    $selectPriceQuery = "SELECT Price FROM Menu_Items WHERE Item_ID = (SELECT Item_ID FROM Order_Items WHERE Order_Item_ID = ?)";
    $stmtSelectPrice = $conn->prepare($selectPriceQuery);
    $stmtSelectPrice->bind_param("i", $order_item_id);
    $stmtSelectPrice->execute();
    $result = $stmtSelectPrice->get_result();
    $row = $result->fetch_assoc();
    $price = $row['Price'];

    // Update the quantity and subtotal directly
    $sql = "UPDATE Order_Items SET Quantity = ?, Subtotal = ? WHERE Order_Item_ID = ?";
    $subtotal = $quantity * $price;
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("idi", $quantity, $subtotal, $order_item_id);
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
