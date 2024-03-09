<?php
session_start();
include "../settings/connection.php";
global $conn;

$item_id = $_GET['item_id'];

if (!isset($_SESSION['isNewOrder'])) {
    $cust_id = $_SESSION['user_id'];
    $rest_id = $_SESSION['rest_id'];

    $sql = "INSERT INTO Orders (Customer_ID, Restaurant_ID) VALUES (?,?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $cust_id, $rest_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        $query = "INSERT INTO Order_Items () VALUES ()";
    }

    $_SESSION['isNewOrder'] = false;
} else {

}

