<?php
$host = "db"; // This must match the service name in docker-compose.yml
$user = "food_user";
$pass = "food_pass";
$dbname = "food_order";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>
