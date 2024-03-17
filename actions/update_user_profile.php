<?php

session_start();
include "../settings/connection.php";
global $conn;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];

    // Assuming you have user authentication and $_SESSION['user_id'] holds the user's ID
    $user_id = $_SESSION['user_id'];

    // Prepare and execute SQL query to update user profile
    $sql = "UPDATE Users SET fname=?, lname=?, gender=?, dob=?, email=?, tel=?, address=? WHERE User_ID=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssssi", $fname, $lname, $gender, $dob, $email, $tel, $address, $user_id);
    $stmt->execute();

    // Check if the update was successful
    if ($stmt->affected_rows > 0) {
        // Return JSON response indicating success
        echo json_encode(array("status" => "success"));
    } else {
        // Return JSON response indicating failure
        echo json_encode(array("status" => "error"));
    }
    exit;
} else {
    // If the form is not submitted via POST method, return an error
    echo json_encode(array("status" => "error", "message" => "Form not submitted"));
    exit;
}