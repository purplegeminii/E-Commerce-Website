<?php
include "../settings/connection.php";
global $conn;

if (isset($_GET['id'])) {
    $menuId = $_GET['id'];

   

    $query = "DELETE FROM menu_items WHERE Item_ID = $menuId";

     if (mysqli_query($conn, $query)) {
         header('Location: ../admin/management.php');
         exit();
     } else {
         echo "Error: " . $query . "<br>" . mysqli_error($conn);
     }
} 

?>
