<?php

include "../settings/connection.php";
global $conn;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve the ID from the POST data
    $id = $_POST['id'] ?? null;

    if ($id !== null) {
        if ($id == 1) {
            // Provide the URL to redirect to in the response
            echo '<script>window.location.href = "../menu/kfcMenu.php";</script>';
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Invalid ID'));
        }
    } else {
        // If ID is not provided in the request, return an error response
        http_response_code(400); // Bad Request
        echo json_encode(array('status' => 'error', 'message' => 'ID parameter missing'));
    }
} else {
    // Handle other HTTP methods if needed
    http_response_code(405); // Method Not Allowed
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request method'));
}
