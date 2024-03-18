<?php

session_start();
include "../settings/connection.php";
global $conn;


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT COUNT(*) AS email_count FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $emailCount = $row['email_count'];

    mysqli_stmt_free_result($stmt);

    if ($emailCount > 0) {
        $query = "SELECT User_ID, rid, passwd FROM Users WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $hashedPasswordFromDatabase = $row['passwd'];

        // Verify the entered password against the stored hash
        if (password_verify($password, $hashedPasswordFromDatabase)) {
            // Passwords match, login successful, set user_id & role_id
            $_SESSION['user_id'] = $row['User_ID'];
            $_SESSION['role_id'] = $row['rid'];
            if ($row['rid']==2) {
                header("location: ../admin/dashboard.php");
            } else if ($row['rid']==3) {
                header("location: ../view/restaurants.php");
            }
            exit();
        } else {
            // Passwords do not match, login failed
            header("location: ../login/login.php");
        }
        exit();
    } else {
        // Email does not exist, login failed
        header("location:../login/login.php");
    }

    mysqli_stmt_free_result($stmt);
    $conn->close();
}

?>