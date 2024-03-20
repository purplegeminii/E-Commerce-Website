<?php

session_start();

if ($_SESSION['role_id'] == 3) {
    include "../functions/cancel_order.php";
}

unset($_SESSION['user_id']);
unset($_SESSION['role_id']);
unset($_SESSION['rest_id']);
unset($_SESSION['rest_url']);
unset($_SESSION['order_id']);
header("location: ../login/login.php");
exit();

?>