<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    $id = $_GET['id'];
    $sql = "SELECT * FROM reg WHERE id = $id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    if (isset($_POST['update_data'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];

        $sql = "UPDATE reg SET name = '$name', email = '$email', phone = '$phone' WHERE id = $id";
        if ($conn->query($sql)) {
            echo "<p>Data updated successfully.</p>";
        } else {
            echo "<p>Error: " . $conn->error . "</p>";
        }
    }
    ?>
    <form method="POST">
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required>
        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
        <input type="text" name="phone" value="<?php echo $row['phone']; ?>" required>
        <button type="submit" name="update_data">Update</button>
    </form>
</body>
</html>
