<?php

header('Content-Type: application/json');

echo json_encode(array(
    'status' => 'success',
    'message' => 'still in progress',
    'redirectUrl' => '../view/item_history.php'
));
