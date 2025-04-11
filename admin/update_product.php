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

$id = $_POST['product-id'];
$title = $_POST['product-title'];
$description = $_POST['product-description'];
$price = $_POST['product-price'];
$category = $_POST['product-category'];
$image1 = $_POST['image1'];

$sql = "UPDATE products 
        SET title = '$title', description = '$description', price = '$price', category = '$category', image1 = '$image1' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo json_encode(['success' => true, 'message' => 'Product updated successfully!']);
} else {
    echo json_encode(['success' => false, 'message' => 'Error: ' . $sql . '<br>' . $conn->error]);
}

$conn->close();
?>