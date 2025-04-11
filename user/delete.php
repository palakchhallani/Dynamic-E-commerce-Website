<?php include 'db.php';

$id = $_GET['id'];
$sql = "DELETE FROM reg WHERE id = $id";

if ($conn->query($sql)) {
    echo "<p>Data deleted successfully.</p>";
} else {
    echo "<p>Error: " . $conn->error . "</p>";
}
header("Location: show.php");
?>
