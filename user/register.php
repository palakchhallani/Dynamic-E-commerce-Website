<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link rel="stylesheet" href="../assets/css/register.css" />
  </head>
  <body>
  <div>
        <button class="back"><a href="./home.html">Home</a></button>
    </div>
    <div class="container">
      <div class="form">
        <h2>Register</h2>
        <form method="post" action="#">
          <div class="input">
            <label for="user">Name</label><br />
            <input
              type="text"
              name="name"
              id="name"
              placeholder="Enter Name"
            />
          </div>
          <div class="input">
            <label for="email">Email</label><br />
            <input
              type="email"
              name="email"
              id="email"
              placeholder="Enter email"
            />
          </div>
          <div class="input">
            <label for="ph">Phone</label><br />
            <input
              type="int"
              name="phone"
              id="ph"
              placeholder="Enter Phone no"
            />
          </div>
          <div class="input">
            <label for="pass">Password</label><br />
            <input type="password" name="password" id="pass" placeholder="Password"/>
          </div>
          <div class="button">
            <button type="submit" name="reg">Register</button>
          </div>
          <div class="register">
            <p>Already have an account?</p>
            <a href="login.php">Log in</a>
          </div>
        </form>

        <?php
          if (isset($_POST['reg'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $password = $_POST['password'];

            $sql = "INSERT INTO reg(name, email, phone, password) VALUES ('$name', '$email', '$phone', '$password')";
            // $conn->query($sql);
            if ($conn->query($sql)) {
              echo "<p><br><br>Data inserted successfully.</p>";
          } else {
              echo "<p>Error: " . $conn->error . "</p>";
          }
          } 
        ?>
      </div>
    </div>
  </body>
</html>
