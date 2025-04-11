<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ecommerce Website</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css" integrity="sha512-5Hs3dF2AEPkpNAR7UiOHba+lRSJNeM2ECkwxUIxC1Q/FLycGTbNapWXB4tP889k5T5Ju8fs4b1P5z/iB4nMfSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../assets/css/shop.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap" rel="stylesheet">
</head>
<body>

    <section id="header">
        <a href="#"><img src="../assets/img/logo.png" class="logo" alt=""></a>

        <div>
            <ul id="navbar">
                <li><a href="home.html">Home</a></li>
                <li><a class="active" href="shop.php">Shop</a></li>
                <li><a href="blog.html">Blog</a></li>
                <li><a href="about.html">About</a></li>
                <li><a href="contact.html">Contact </a></li>
                <li id="lg-bag"><a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a></li>
                <a href="#" id="close"><i class="fa -solid fa-xmark"></i></a>
            </ul>
        </div>

        <div id="mobile">
            <a href="cart.html"><i class="fa-solid fa-bag-shopping"></i></a>
            <i id="bar" class="fas fa-outdent"></i>
        </div>

    </section>

    <section id="page-header">
    <img src="./banner.jpg" alt="Banner Image" class="header-image">
    <div class="header-content">
        <h2>#stayhome</h2>
        <p>Save more with coupons & up to 70% off! </p>
    </div>
    </section>

    <section id="product1" class="section-p1">
        <div class="pro-container">
            <?php
            // Fetch products from the database
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

            $sql = "SELECT * FROM products";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='pro' onclick=\"window.location.href='sproduct.php?id={$row['id']}';\">
                        <img src='{$row['image1']}' alt=''>
                        <div class='des'>
                            <span>{$row['category']}</span>
                            <h5>{$row['title']}</h5>
                            <div class='star'>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                                <i class='fas fa-star'></i>
                            </div>
                            <h4>\${$row['price']}</h4>
                        </div>
                        <a href='#'><i class='fa-solid fa-cart-shopping cart'></i></a>
                    </div>";
                }
            } else {
                echo "<p>No products found.</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <section id="pagination" class="section-p1">
        <a href="#">1</a>
        <a href="#">2</a>
        <a href="#"><i class="fa-solid fa-arrow-right-long"></i></a>
    </section>

    <section id="newsletter" class="section-p1 section-m1">
        <div class="newstext">
            <h4>Sign Up For Newsletters</h4>
            <p>Get E-mail updates about our latest shop and  <span>special offers.</span></p>
        </div>
        <div class="form">
            <input type="text" placeholder="Your email address">
            <button class="normal">Sign Up</button>
        </div>
    </section>

    <footer class="section-p1">
        <div class="col">
            <img class="logo" src="../assets/img/logo.png" alt="">
            <h4>Contact</h4>
            <p><strong>Address:</strong> 562 Wellington Road, Street 32, San Francisco</p>
            <p><strong>Phone:</strong> +01 2222 365 / (+91) 01 2345 6789 </p>
            <p><strong>Hours:</strong> 10:00 - 18:00, Mon - Sat</p>
            <div class="follow">
                <h4>Follow us</h4>
                <div class="icon">
                    <i class="fab fa-facebook-f"></i>
                    <i class="fab fa-twitter"></i>
                    <i class="fab fa-instagram"></i>
                    <i class="fab fa-pinterest-p"></i>
                    <i class="fab fa-youtube"></i>
                </div>
            </div>
        </div>

        <div class="col">
            <h4>About</h4>
            <a href="#">About us</a>
            <a href="#">Delivery Information</a>
            <a href="#">Privacy Policy  </a>
            <a href="#">Terms & Conditions</a>
            <a href="#">Contact us</a>
        </div>

        <div class="col">
            <h4>My Account</h4>
            <a href="#">Sign in</a>
            <a href="#">View Cart</a>
            <a href="#">My Wishlist</a>
            <a href="#">Track My Order</a>
            <a href="#">Help</a>
        </div>

        <div class="col install">
            <h4>Install App</h4>
            <p>From App Store or Google Play</p>
            <div class="row">
                <img src="../assets/img/pay/app.jpg" alt="">
                <img src="../assets/img/pay/play.jpg" alt="">
            </div>
            <p>Secured Payment Gateways</p>
            <img src="../assets/img/pay/pay.png" alt="">
        </div>

        <div class="copyright">
            <p> © 2024. All Rights Reserved. </p>
        </div>
    </footer>
</body>
</html>