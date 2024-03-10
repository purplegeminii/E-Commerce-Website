<?php
session_start();
include "../settings/connection.php";
//include "../settings/core.php";
global $conn;

$item_id = $_GET['item_id'];
$cust_id = $_SESSION['user_id'];
$rest_id = $_SESSION['rest_id'];

function make_new_order($cust_id, $rest_id): bool {
    global $conn;
    $sql = "INSERT INTO Orders (Customer_ID, Restaurant_ID, Status, Total_Price, Delivery_Address, Order_Date_Time, Delivery_Date_Time, Payment_Status) 
            VALUES (?,?, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT, DEFAULT)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cust_id, $rest_id);
    $stmt->execute();
    return $stmt->affected_rows > 0;
}

function get_order_by_id($cust_id): false|mysqli_result {
    global $conn;
    $sql = "SELECT * FROM Orders WHERE Customer_ID = ?
            ORDER BY Order_Date_Time DESC
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cust_id);
    $stmt->execute();
    return $stmt->get_result();
}

function add_to_cart($order_id, $item_id): bool {
    global $conn;
    $sql = "INSERT INTO Order_Items (Order_ID, Item_ID, Quantity, Subtotal) VALUES (?,?,1,0.00)";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo "Error preparing statement: " . $conn->error;
        return false;
    }

    $stmt->bind_param("ii", $order_id,$item_id);
    $stmt->execute();

    if ($stmt->errno) {
        echo "Error executing statement: " . $stmt->error;
        return false;
    }

    return $stmt->affected_rows > 0;
}

if (!isset($_SESSION['order_id'])) {
    echo "debug isset(order_id)";

    $result = make_new_order($cust_id, $rest_id);

    if ($result) {
        echo "get order by customer id";

        $result2 = get_order_by_id($cust_id);
        var_dump($result2);

        if ($result2) {
            echo "debug add to cart";

            $row = mysqli_fetch_assoc($result2);
            $order_id = $row['Order_ID'];
            $_SESSION['order_id'] = $order_id;

            $result3 = add_to_cart($order_id, $item_id);

            if ($result3) {
                // Item added to the cart successfully
                echo "<script>alert('Added to cart');</script>";

                // Redirect to the specified URL
                header("Location: {$_SESSION['rest_url']}");
                exit;
            } else {
                echo "Error adding to cart";
            }
        }
    }

} else {

    $order_id = $_SESSION['order_id'];

    $result = add_to_cart($order_id, $item_id);

    if ($result) {
        // Item added to the cart successfully
        echo "<script>alert('Added to cart');</script>";

        // Redirect to the specified URL
        header("Location: {$_SESSION['rest_url']}");
        exit;
    } else {
        echo "Error adding to cart";
    }

}
