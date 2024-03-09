<?php
session_start();
include "../settings/connection.php";
global $conn;

$item_id = $_GET['item_id'];
$cust_id = $_SESSION['user_id'];
$rest_id = $_SESSION['rest_id'];

function make_new_order($cust_id, $rest_id): false|mysqli_result {
    global $conn;
    $sql = "INSERT INTO Orders (Customer_ID, Restaurant_ID, Status, Total_Price, Delivery_Address, Order_Date_Time, Delivery_Date_Time, Payment_Status) 
            VALUES (?,?, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cust_id, $rest_id);
    $stmt->execute();
    return $stmt->get_result();
}

function get_order_by_id($cust_id): false|mysqli_result {
    global $conn;
    $sql = "SELECT *
                 FROM Orders
                 WHERE Customer_ID = ?
                 ORDER BY Order_Date_Time DESC
                 LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cust_id);
    $stmt->execute();
    return $stmt->get_result();
}

function add_to_cart($order_id, $item_id): false|mysqli_stmt {
    global $conn;
    $sql = "INSERT INTO Order_Items (Order_ID, Item_ID, Quantity) 
            VALUES (?,?,DEFAULT)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $order_id,$item_id);
    $stmt->execute();
    return $stmt;
}

if (!isset($_SESSION['isNewOrder'])) {

    $result = make_new_order($cust_id, $rest_id);

    if ($result) {

        $result2 = get_order_by_id($cust_id);

        if ($result2) {
            $row = mysqli_fetch_all($result2, MYSQLI_ASSOC);
            $order_id = $row['Order_ID'];
            $_SESSION['order_id'] = $order_id;

            $result3 = add_to_cart($order_id, $item_id);

            if ($result3->affected_rows > 0) {
                echo "<script>alert('added to cart');</script>";
                echo "<script src='../js/restaurant-listings.js'>goToMenu($rest_id)</script>";
            }
        }
    }

    $_SESSION['isNewOrder'] = false;

} else {

    $order_id = $_SESSION['order_id'];

    $result = add_to_cart($order_id, $item_id);

    if ($result->affected_rows > 0) {
        echo "<script>alert('added to cart');</script>";
        echo "<script src='../js/restaurant-listings.js'>goToMenu($rest_id)</script>";
    }

}

