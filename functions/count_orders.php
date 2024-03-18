<?php

include "../settings/connection.php";
global $conn;

$sql = "SELECT
            SUM(IF(DATE(Order_Date_Time) = CURDATE(), 1, 0)) AS PaidOrdersToday,
            SUM(IF(YEARWEEK(Order_Date_Time, 1) = YEARWEEK(CURDATE(), 1), 1, 0)) AS PaidOrdersThisWeek,
            SUM(IF(YEAR(Order_Date_Time) = YEAR(CURDATE()) AND MONTH(Order_Date_Time) = MONTH(CURDATE()), 1, 0)) AS PaidOrdersThisMonth
        FROM Orders
        WHERE Payment_Status = 'Paid'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$orders_count = $stmt->get_result()->fetch_assoc();

mysqli_close($conn);
