<?php

header('Content-Type: application/json');

echo json_encode(array(
    'status' => 'success',
    'message' => 'user profile in progress',
    'redirectUrl' => '../view/user_profile.php'
));
