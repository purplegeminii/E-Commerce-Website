<?php

session_start();
include "../settings/connection.php";

// if (isset($_POST['login-button'])) {}
if ($_SERVER['HTTP_REFERER'] == "http://localhost/cms/login/login.php") {
    $email = mysqli_real_escape_string($conn, $_POST['email-input']);
    $password = mysqli_real_escape_string($conn, $_POST['password-input']);

    $query = "SELECT COUNT(*) AS email_count, passwd FROM people WHERE email = ?";
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
            // Passwords match, login successful
            header("location: ../view/dashboard.php");
            exit();
        } else {
            // Passwords do not match, login failed
            header("location: ../login/login.php");
            exit();
        }
    } else {
        echo "Email does not exist in the database.";
        header("location: ../login/login.php");
        exit();
    }

    

    $stmt->close();
    $conn->close();
}

?>