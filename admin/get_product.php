<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecommerce";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    echo json_encode($product);
} else {
    echo json_encode(['error' => 'Product not found']);
}

$conn->close();
?>