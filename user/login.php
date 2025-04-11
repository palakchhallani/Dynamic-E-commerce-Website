<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/login.css">
</head>
<body>
    <div>
        <button class="back"><a href="./home.html">Home</a></button>
    </div>
    <div class="container">
        <div class="form">
            <h2>Login</h2>
            <form action="#" method="post">
                <div class="input">
                    <label for="user">Your Username:</label><br>
                    <input type="email" name="name" id="user" placeholder="Enter Email">
                </div>
                <div class="input">
                    <label for="pass">Enter Password:</label><br>
                    <input type="password" name="password" id="pass" placeholder="Enter Password">
                </div>
                <div class="remember">
                    <label><input type="checkbox">Remember me</label>
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="button">
                    <button type="submit" name="submit">Submit</button>
                </div>
            </form>

        <?php
            if (isset($_POST['submit'])) {
                $name = $_POST['name'];
                $password = $_POST['password'];

                $sql = "INSERT INTO login(name, password) VALUES ('$name', '$password')";
                if ($conn->query($sql)) {
                    echo "<p>Data inserted successfully.</p>";
                } else {
                    echo "<p>Error: " . $conn->error . "</p>";
                }
            }
        ?>
        </div>
    </div>
</body>
</html>