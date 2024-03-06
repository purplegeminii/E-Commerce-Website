<?php

session_start();
include "../settings/connection.php";
global $conn;

//header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT COUNT(*) AS email_count, User_ID, rid, passwd FROM Users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    $emailCount = $row['email_count'];
    $hashedPasswordFromDatabase = $row['passwd'];

    if ($emailCount > 0) {
        // Verify the entered password against the stored hash
        if (password_verify($password, $hashedPasswordFromDatabase)) {
            // Passwords match, login successful, set user_id & role_id
            $_SESSION['user_id'] = $row['User_ID'];
            $_SESSION['role_id'] = $row['rid'];
//            echo '<script>alert("login successful");</script>';
//            echo '<script>window.location.href="../restaurant-listings/restaurants.php";</script>';
            header("location:../restaurant-listings/restaurants.php");
//            echo json_encode(array('status' => 'success', 'redirectUrl' => '../restaurant-listings/restaurants.php'));
            exit();
        } else {
            // Passwords do not match, login failed
//            echo '<script>alert("login failed, wrong email or password");</script>';
//            echo '<script>window.location.href="../login/login.php";</script>';
            header("location: ../login/login.php");
//            echo json_encode(array('status' => 'error', 'message' => 'Login failed'));
        }
        exit();
    } else {
//        echo '<script>alert("Email does not exist")</script>';
//        echo '<script>window.location.href="../login/login.php";</script>';
        header("location:../login/login.php");
    }

    mysqli_stmt_free_result($stmt);
    $conn->close();
}

?>