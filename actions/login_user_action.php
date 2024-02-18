<?php

session_start();
include "../settings/connection.php";
global $conn;

// if (isset($_POST['login-button'])) {
//if ($_SERVER['HTTP_REFERER'] == "../login/login_view.php") {
if (isset($_POST['login-button'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email-input']);
    $password = mysqli_real_escape_string($conn, $_POST['password-input']);

    $query = "SELECT COUNT(*) AS email_count, pid, rid, passwd FROM People WHERE email = ?";
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
            $_SESSION['user_id'] = $row['pid'];
            $_SESSION['role_id'] = $row['rid'];
            echo '<script>alert("login successful");</script>';
            echo '<script>window.location.href="../view/dashboard.php";</script>';
        } else {
            // Passwords do not match, login failed
            echo '<script>alert("login failed");</script>';
            echo '<script>window.location.href="../login/login_view.php";</script>';
        }
        exit();
    } else {
        echo "Email does not exist in the database.";
        header("location: ../login/login_view.php");
    }


    mysqli_stmt_free_result($stmt);
    $conn->close();
}

?>