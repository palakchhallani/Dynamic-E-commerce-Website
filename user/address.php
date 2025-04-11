<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Shipping Address Form</title>
  <link rel="stylesheet" href="../assets/css/address.css">
</head>
<body>
    <div class="nav">
        <button class="back"><a href="./profile.php">Back</a></button>
    </div>
  <div class="form-container">
    <h2>Enter Your Shipping Address</h2>
    <form id="addressForm" method="post">
      <label for="fullName">Full Name:</label>
      <input type="text" id="fullName" name="name" required>

      <label for="street">Street Address:</label>
      <input type="text" id="street" name="street" required>

      <label for="city">City:</label>
      <input type="text" id="city" name="city" required>

      <label for="state">State/Province:</label>
      <input type="text" id="state" name="state" required>

      <label for="zipCode">PIN Code:</label>
      <input type="text" id="zipCode" name="pin" required>

      <label for="country">Country:</label>
      <select id="country" name="country" required>
        <option value="">Select Country</option>
        <option value="USA">United States</option>
        <option value="Canada">Canada</option>
        <option value="UK">United Kingdom</option>
        <option value="India">India</option>
        <!-- Add more countries as needed -->
      </select>

      <button type="submit" name="address">Submit</button>
    </form>

    <?php
          if (isset($_POST['address'])){
            $name = $_POST['name'];
            $street = $_POST['street'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $pin = $_POST['pin'];
            $country = $_POST['country'];

            $sql = "INSERT INTO address(name, street, city, state, pin, country) VALUES ('$name', '$street', '$city', '$state', '$pin', '$country')";
            $conn->query($sql);
          //   if ($conn->query($sql)) {
          //     echo "<p>Data inserted successfully.</p>";
          //  } else {
          //     echo "<p>Error: " . $conn->error . "</p>";
          //  }
          } 
    ?>
  </div>

</body>
</html>