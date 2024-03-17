<?php
include "../settings/connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST['itemId'], $_POST['itemName'])) {
        $itemId = $_POST['itemId'];
        $name = $_POST['itemName'];
        
        $query = "UPDATE menu_items SET Name = ? WHERE Item_ID = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("si", $name, $itemId);
        
        if ($stmt->execute()) {
            header('Location: ../admin/management(2).php');
            exit();
        } else {
            echo "Error updating menu item: " . $stmt->error;
        }
        
        $stmt->close();
    }
}
?>
