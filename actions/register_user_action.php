<?php

session_start();
include "../settings/connection.php";
global $conn;

if (isset($_POST['sign-up-button'])) {
//$_SERVER['HTTP_REFERER'] == "http://localhost/cms/login/register_view.php"
//if ($_SERVER['HTTP_REFERER'] == "localhost/cms/login/register_view.php") {

    $fname = mysqli_real_escape_string($conn, $_POST['first-name-input']);

    $lname = mysqli_real_escape_string($conn, $_POST['last-name-input']);

    $gender = mysqli_real_escape_string($conn, $_POST['gender']);

//    $fid = mysqli_real_escape_string($conn, $_POST['family-role']);

    $dob = mysqli_real_escape_string($conn, $_POST['date-of-birth']);

    $phone_num = mysqli_real_escape_string($conn, $_POST['phone-number']);

    $email = mysqli_real_escape_string($conn, $_POST['email-input']);

    $password1 = mysqli_real_escape_string($conn, $_POST['password1']);
    $password2 = mysqli_real_escape_string($conn, $_POST['password2']);

    if ($password1 != $password2) {
        echo '<script>alert("passwords do not match");</script>';
        echo '<script>window.location.href="../login/register_view.php";</script>';
        exit();
    }

    $hashedPassword = password_hash($password1, PASSWORD_DEFAULT);

    $query = "INSERT INTO People (rid, fid, fname, lname, gender, dob, tel, email, passwd) VALUE (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $create_record = $conn->prepare($query);
    $rid = 3;
//    $create_record->bind_param('iississss', $rid, $fid, $fname, $lname, $gender, $dob, $phone_num, $email, $hashedPassword);
    $create_record->bind_param('ississss', $rid, $fname, $lname, $gender, $dob, $phone_num, $email, $hashedPassword);

    $create_record->execute();


    if ($create_record->affected_rows > 0) {
        echo '<script>alert("register successful")</script>';
        echo '<script>window.location.href="../login/login_view.php";</script>';
        exit();
    } else {
        echo '<script>alert("Couldn\'t register. An error occurred.")</script>';
        echo '<script>window.location.href="../login/register_view.php";</script>';
    }

    $create_record->close();
    $conn->close();
}


?>