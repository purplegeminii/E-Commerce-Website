<?php

include "../settings/connection.php";

function get_item_history($user_id): false|mysqli_result {
    global $conn;
    $sql = "SELECT 
                O.Order_Date_Time,
                MI.Name AS Item_Name,
                MI.Description AS Item_Description,
                MI.Price AS Item_Price,
                OI.Quantity,
                OI.Subtotal
            FROM 
                Orders O
            JOIN 
                Order_Items OI ON O.Order_ID = OI.Order_ID
            JOIN 
                Menu_Items MI ON OI.Item_ID = MI.Item_ID
            WHERE 
                O.Customer_ID = ? AND O.Status = 'Completed'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    return $stmt->get_result();
}
