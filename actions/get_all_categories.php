<?php

include "../settings/connection.php";

function get_all_categories($rest_id): array {
    global $conn;
    $sql = "SELECT DISTINCT Category AS name FROM Menu_Items WHERE Restaurant_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rest_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $rows = [];

    if ($result) {
        $rows = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();
    } else {
        echo "Error: " . $sql . "<br />" . mysqli_error($conn);
    }

    return $rows;
}
