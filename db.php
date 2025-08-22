<?php
// Database connection settings
$host = "localhost";
$user = "root";     // change if needed
$pass = "";         // change if needed
$db   = "user_auth";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");
?>
