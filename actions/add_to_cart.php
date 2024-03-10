<?php
session_start();
include "../settings/connection.php";
global $conn;

$item_id = $_GET['item_id'];
$cust_id = $_SESSION['user_id'];
$rest_id = $_SESSION['rest_id'];

function add_to_cart($cust_id, $rest_id, $item_id): bool {
    global $conn;

    // Check if an open order exists for the customer and restaurant
    $existingOrderQuery = "SELECT Order_ID FROM Orders WHERE Customer_ID = ? AND Restaurant_ID = ? AND Status = 'Pending'";
    $stmtExistingOrder = $conn->prepare($existingOrderQuery);
    $stmtExistingOrder->bind_param("ii", $cust_id, $rest_id);
    $stmtExistingOrder->execute();
    $existingOrderResult = $stmtExistingOrder->get_result();

    if ($existingOrderResult->num_rows > 0) {
        // Use the existing open order
        $orderRow = $existingOrderResult->fetch_assoc();
        $order_id = $orderRow['Order_ID'];
        $_SESSION['order_id'] = $orderRow['Order_ID'];
    } else {
        // Create a new order
        $newOrderQuery = "INSERT INTO Orders (Customer_ID, Restaurant_ID, Status) VALUES (?, ?, 'Pending')";
        $stmtNewOrder = $conn->prepare($newOrderQuery);
        $stmtNewOrder->bind_param("ii", $cust_id, $rest_id);
        $stmtNewOrder->execute();

        // Get the ID of the newly created order
        $order_id = $stmtNewOrder->insert_id;
        $_SESSION['order_id'] = $order_id;
    }

    // Add the item to the cart
    $addItemQuery = "INSERT INTO Order_Items (Order_ID, Item_ID, Quantity, Subtotal) VALUES (?, ?, 1, 0.00)";
    $stmtAddItem = $conn->prepare($addItemQuery);
    $stmtAddItem->bind_param("ii", $order_id, $item_id);
    $stmtAddItem->execute();

    return $stmtAddItem->affected_rows > 0;
}

$result = add_to_cart($cust_id, $rest_id, $item_id);

if ($result) {
    header("Location: {$_SESSION['rest_url']}");
    exit();
} else {
    echo "Error adding item to cart";
}

?>