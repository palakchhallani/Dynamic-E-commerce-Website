<?php include 'db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>
    <div class="header">
        <div class="avt-container">
            <img src="../assets/img/dp.webp" alt="avt" class="avt">
            <h2>Hello, User</h2>
        </div>
        <button class="edit" ><a href="home.html">Home</a></button>
    </div>
    <div class="hero">
        <div class="opt">
            <ul>
                <li id="overview">Overview</li>
                <li id="mycart">MyCart</li>
                <!-- <li id="orders">Orders & Returns</li> -->
                <li id="address">Your Address</li>
                <li id="payment">Payment Options</li>
                <li id="contact">Contact Us</li>
                <li id="logout">Logout</li>
            </ul>
        </div>
        <div class="details">
            <div id="content-overview" class="content active">
            <h1>Data Table</h1>
                <table border="1" width="1000px" class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM reg";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['phone']}</td>
                            <td>
                                <a href='view.php?id={$row['id']}'>View</a>
                                <a href='update.php?id={$row['id']}'>Update</a>
                                <a href='delete.php?id={$row['id']}'>Delete</a>
                            </td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="content-mycart" class="content" style="display: none;">
                <iframe src="cart.html" width="1400" height="750"></iframe>
            </div>
            <!-- <div id="content-orders" class="content" style="display: none;">Your orders and returns details.</div> -->
            <div id="content-address" class="content" style="display: none;">
                <a href="address.php" class="log">Add Address</a><br><br><br>
                <h3>Your addresses</h3><hr>
                <table border="1" width="1000px" class="table">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Street</th>
                        <th>City</th>
                        <th>State</th>
                        <th>Pin</th>
                        <th>Country</th>
                    </tr>
                    <?php
                    $sql = "SELECT * FROM address";
                    $result = $conn->query($sql);

                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>{$row['id']}</td>
                            <td>{$row['name']}</td>
                            <td>{$row['street']}</td>
                            <td>{$row['city']}</td>
                            <td>{$row['state']}</td>
                            <td>{$row['pin']}</td>
                            <td>{$row['country']}</td>
                        </tr>";
                    }
                    ?>
                </table>
            </div>
            <div id="content-payment" class="content" style="display: none;">
                <iframe src="pay.html" width="600" height="400"></iframe>
            </div>
            <div id="content-contact" class="content" style="display: none;">
                <iframe src="contact.html" width="1400" height="750"></iframe>
            </div>
            <div id="content-logout" class="content " style="display: none;">
                <h2>Logout</h2>
                <p>You have successfully logged out. Thank you for visiting!</p><br><br>
                <a href="./login.php" class="log">Log back in</a>
            </div>
        </div>
        
    </div>

    <script src="../assets/js/profile.js"></script>
</body>
</html>