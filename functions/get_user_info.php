<?php

session_start();
include "../settings/connection.php";

function get_user_info(): array|false|null {
    global $conn;
    $sql = "SELECT
                fname,
                lname,
                gender,
                dob,
                email,
                tel,
                address,
                Role.rolename AS role
            FROM
                Users
            INNER JOIN
                Role ON Users.rid = Role.rid
            WHERE
                User_ID = ?";
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $result = $stmt->execute();

    if ($result) {
        return $stmt->get_result()->fetch_assoc();
    } else {
        return false;
    }
}
