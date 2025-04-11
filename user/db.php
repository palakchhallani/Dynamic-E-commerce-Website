<?php
// db.php
$host = "localhost";
$user = "root";
$password = "";
$database = "shopping_db"; // Replace with your database name

$conn = new mysqli($host, $user, $password);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Create the database if it doesn't exist
$sql = "CREATE DATABASE IF NOT EXISTS $database";
$conn->query($sql);

$conn->select_db($database);
?>
