<?php

include "../settings/connection.php";

function get_cart_items($order_id): false|mysqli_result {
    global $conn;

    $sql = "SELECT
                oi.Order_Item_ID AS Order_Item_ID,
                oi.Item_ID AS Item_ID,
                mi.Name AS Item_Name,
                mi.Price AS Item_Price,
                oi.Quantity AS Quantity,
                oi.Subtotal AS Subtotal,
                mi.Img_src AS Item_Image
            FROM
                Order_Items oi
            JOIN
                Menu_Items mi ON oi.Item_ID = mi.Item_ID
            WHERE
                oi.Order_ID = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc();
}
