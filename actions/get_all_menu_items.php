<?php

include "../settings/connection.php";

function get_all_menu_items($rest_id): array {
    global $conn;
    $availability = 1;
    $sql = "SELECT * FROM Menu_Items WHERE Restaurant_ID = ? AND Availability = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $rest_id, $availability);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows=[];

    if ($result) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . $sql . "<br />" . mysqli_error($conn);
    }

    mysqli_free_result($result);
//    mysqli_close($conn);

    return $rows;
}
