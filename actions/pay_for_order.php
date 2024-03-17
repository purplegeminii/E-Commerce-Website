<?php

session_start();
include "../settings/connection.php";
global $conn;


$order_id = $_SESSION['order_id'];
$amount = 1000;

function generateRandomString($length = 10): string {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
    $maxIndex = strlen($characters) - 1;

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $maxIndex)];
    }

    return $randomString;
}

$payment_method = generateRandomString();
$transaction_id = generateRandomString(14);

// Start a transaction
mysqli_begin_transaction($conn);

// Insert a record into the Payments table
$insert_payment_sql = "INSERT INTO Payments (Order_ID, Amount, Payment_Date_Time, Payment_Method, Transaction_ID) 
                       VALUES (?, ?, NOW(), ?, ?)";
$insert_payment_stmt = $conn->prepare($insert_payment_sql);
$insert_payment_stmt->bind_param("idss", $order_id, $amount, $payment_method, $transaction_id);
$insert_payment_success = $insert_payment_stmt->execute();

// Update the Payment_Status field in the Orders table
$update_order_sql = "UPDATE Orders SET Payment_Status = 'Paid', Status = 'Completed' WHERE Order_ID = ?";
$update_order_stmt = $conn->prepare($update_order_sql);
$update_order_stmt->bind_param("i", $order_id);
$update_order_success = $update_order_stmt->execute();

// Check if both queries were successful
if ($insert_payment_success && $update_order_success) {
    // Commit the transaction if both queries were successful
    mysqli_commit($conn);
    header("location: ../restaurant-listings/restaurants.php");
} else {
    // Rollback the transaction if any query failed
    mysqli_rollback($conn);
    echo "Error: Failed to process payment.";
}

// Close prepared statements
$insert_payment_stmt->close();
$update_order_stmt->close();

// Close the database connection
mysqli_close($conn);

