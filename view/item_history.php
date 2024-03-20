<?php
session_start();
include "../functions/get_item_history_fxn.php";
$items = get_item_history($_SESSION['user_id']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/item-history.css">
    <title>Item History</title>
</head>
<body>
    <div id="content">
        <div class="container">
            <h1>Item History</h1>
            <?php
            if ($items) {
                echo '<table>';
                echo '<tr><th>Date</th><th>Item Name</th><th>Price</th><th>Quantity</th><th>Subtotal</th></tr>';
                foreach ($items as $item) {
                    echo '<tr>';
                    echo '<td>' . $item['Order_Date_Time'] . '</td>';
                    echo '<td>' . $item['Item_Name'] . '</td>';
                    echo '<td>' . $item['Item_Price'] . '</td>';
                    echo '<td>' . $item['Quantity'] . '</td>';
                    echo '<td>' . $item['Subtotal'] . '</td>';
                    echo '</tr>';
                }
                echo '</table>';
            } else {
                echo "<p>You have no items in your history.</p>";
            }
            ?>

        </div>
    </div>
</body>
</html>
