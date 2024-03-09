<?php
session_start();
include "../settings/connection.php";

$item_id = $_GET['item_id'];

if (!isset($_SESSION['isNewOrder'])) {
    $cust_id = $_SESSION['user_id'];
    $rest_id = $_SESSION['rest_id'];

    $_SESSION['isNewOrder'] = false;
} else {

}

