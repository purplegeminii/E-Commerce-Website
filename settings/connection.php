<?php

$SERVER = "localhost";
$USERNAME = "root";
$PASSWD = "cs341webtech";
$DATABASE = "EE2025";

$conn = new mysqli($SERVER, $USERNAME, $PASSWD, $DATABASE) or die ("could not connect database");

// check conn
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>