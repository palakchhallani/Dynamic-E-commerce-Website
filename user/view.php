<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM reg WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    ?>
    <div class="card">
        <h2>Name: <?php echo $row['name']; ?></h2>
        <p>Email: <?php echo $row['email']; ?></p>
        <p>Phone: <?php echo $row['phone']; ?></p>
    </div>
</body>
</html>
