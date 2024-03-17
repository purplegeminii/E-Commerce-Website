<?php
session_start();
include "../settings/connection.php";
$_SESSION['rest_id'] = 1;
$rest_id = $_SESSION['rest_id'];

function get_menu_items() {
    global $conn, $rest_id;
    $sql = "SELECT * FROM Menu_Items WHERE Restaurant_ID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $rest_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $rows = array();

    if ($result) {
        $rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
    } else {
        echo "Error: " . $sql . "<br />" . mysqli_error($conn);
    }

    return $rows;
}


?>
