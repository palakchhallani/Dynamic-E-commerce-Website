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

$title = $_POST['product-title'];
$description = $_POST['product-description'];
$price = $_POST['product-price'];
$category = $_POST['product-category'];
$image1 = $_POST['image1'];

$sql = "INSERT INTO products (title, description, price, category, image1) 
        VALUES ('$title', '$description', '$price', '$category', '$image1')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();
?>