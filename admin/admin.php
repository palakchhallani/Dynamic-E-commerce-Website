<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.1/css/all.min.css">
    <style>
        body {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-white shadow">
        <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
            <a href="#" class="text-2xl font-bold text-gray-800">Admin Panel</a>
            <ul class="flex space-x-6">
                <li><a href="#dashboard" class="text-gray-800 hover:text-blue-500">Dashboard</a></li>
                <li><a href="#products" class="text-gray-800 hover:text-blue-500">Products</a></li>
                <li><a href="../index.html" class="text-gray-800 hover:text-blue-500">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-6 py-8">
        <!-- Dashboard Section -->
        <section id="dashboard" class="mb-8">
            <h2 class="text-2xl font-bold mb-4">Dashboard</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                <?php
                // Fetch total products by category and their total value
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

                $sql = "SELECT category, COUNT(*) as total, SUM(price) as total_value FROM products GROUP BY category";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<div class='bg-white p-6 rounded-3xl shadow'>
                                <h3 class='text-lg font-semibold'>{$row['category']}</h3>
                                <p class='text-2xl'>{$row['total']} Products</p>
                                <p class='text-xl'>Total Value: ₹" . number_format($row['total_value'], 2) . "</p>
                              </div>";
                    }
                } else {
                    echo "<div class='bg-white p-6 rounded-3xl shadow'>
                            <h3 class='text-lg font-semibold'>No Products Found</h3>
                          </div>";
                }

                $conn->close();
                ?>
            </div>
        </section>

        <!-- Products Section -->
        <section id="products">
            <h2 class="text-2xl font-bold mb-4">Manage Products</h2>
            <button id="add-product-btn" class="bg-blue-500 text-white px-4 py-2 rounded-3xl hover:bg-blue-600">Add Product</button>
            <div class="mt-6 overflow-x-auto">
                <table class="min-w-full bg-white rounded-3xl shadow">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-6 py-3 text-left">ID</th>
                            <th class="px-6 py-3 text-left">Image</th>
                            <th class="px-6 py-3 text-left">Name</th>
                            <th class="px-6 py-3 text-left">Category</th>
                            <th class="px-6 py-3 text-left">Price</th>
                            <th class="px-6 py-3 text-left">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="products-table-body">
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
                                echo "<tr>
                                        <td class='px-6 py-4'>{$row['id']}</td>
                                        <td class='px-6 py-4'><img src='{$row['image1']}' alt='Product Image' class='w-16 h-16 object-cover rounded-3xl'></td>
                                        <td class='px-6 py-4'>{$row['title']}</td>
                                        <td class='px-6 py-4'>{$row['category']}</td>
                                        <td class='px-6 py-4'>$" . number_format($row['price'], 2) . "</td>
                                        <td class='px-6 py-4'>
                                            <button onclick='openEditModal({$row['id']})' class='text-blue-500 hover:text-blue-700'>Edit</button>
                                            <button onclick='deleteProduct({$row['id']})' class='text-red-500 hover:text-red-700 ml-2'>Delete</button>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='px-6 py-4 text-center'>No products found.</td></tr>";
                        }

                        $conn->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    <!-- Add/Edit Product Modal -->
    <div id="product-modal" class="fixed inset-0 bg-black bg-opacity-50 hidden">
        <div class="bg-white rounded-3xl p-8 max-w-md mx-auto mt-20">
            <div class="flex justify-between items-center mb-6">
                <h2 id="modal-title" class="text-2xl font-bold">Add Product</h2>
                <button id="close-modal" class="text-gray-500 hover:text-gray-700">&times;</button>
            </div>
            <form id="product-form" action="" method="POST">
                <input type="hidden" id="product-id" name="product-id">
                <div class="space-y-4">
                    <div>
                        <label for="image1" class="block text-sm font-medium text-gray-700">Image URL:</label>
                        <input type="url" id="image1" name="image1" class="mt-1 block w-full rounded-3xl border-gray-300 p-2" placeholder="Enter image URL" required>
                    </div>
                    <div>
                        <label for="product-title" class="block text-sm font-medium text-gray-700">Product Title:</label>
                        <input type="text" id="product-title" name="product-title" class="mt-1 block w-full rounded-3xl border-gray-300 p-2" placeholder="Enter product title" required>
                    </div>
                    <div>
                        <label for="product-description" class="block text-sm font-medium text-gray-700">Product Description:</label>
                        <textarea id="product-description" name="product-description" class="mt-1 block w-full rounded-3xl border-gray-300 p-2" placeholder="Enter product description" required></textarea>
                    </div>
                    <div>
                        <label for="product-price" class="block text-sm font-medium text-gray-700">Product Price:</label>
                        <input type="number" id="product-price" name="product-price" step="0.01" class="mt-1 block w-full rounded-3xl border-gray-300 p-2" placeholder="Enter product price" required>
                    </div>
                    <div>
                        <label for="product-category" class="block text-sm font-medium text-gray-700">Category:</label>
                        <select id="product-category" name="product-category" class="mt-1 block w-full rounded-3xl border-gray-300 p-2" required>
                            <option value="T-shirts">T-shirts</option>
                            <option value="Pants">Pants</option>
                            <option value="Shoes">Shoes</option>
                            <option value="Accessories">Accessories</option>
                        </select>
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-3xl hover:bg-blue-600">Save Product</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-6 py-4 text-center">
            <p>&copy; 2024. Admin Panel - Ecommerce Website</p>
        </div>
    </footer>

    <!-- JavaScript -->
    <script>
        // Modal functionality
        const addProductBtn = document.getElementById('add-product-btn');
        const modal = document.getElementById('product-modal');
        const closeModal = document.getElementById('close-modal');
        const modalTitle = document.getElementById('modal-title');
        const productForm = document.getElementById('product-form');
        const productIdInput = document.getElementById('product-id');

        // Open modal for adding a product
        addProductBtn.addEventListener('click', () => {
            modalTitle.textContent = "Add Product";
            productForm.reset();
            productIdInput.value = ""; // Clear product ID for new product
            modal.classList.remove('hidden');
        });

        // Close modal
        closeModal.addEventListener('click', () => {
            modal.classList.add('hidden');
        });

        // Open modal for editing a product
        function openEditModal(id) {
            // Fetch product details by ID
            fetch(`get_product.php?id=${id}`)
                .then(response => response.json())
                .then(product => {
                    modalTitle.textContent = "Edit Product";
                    productIdInput.value = product.id;
                    document.getElementById('image1').value = product.image1;
                    document.getElementById('product-title').value = product.title;
                    document.getElementById('product-description').value = product.description;
                    document.getElementById('product-price').value = product.price;
                    document.getElementById('product-category').value = product.category;
                    modal.classList.remove('hidden');
                });
        }

        // Delete product
        function deleteProduct(id) {
            if (confirm("Are you sure you want to delete this product?")) {
                fetch(`delete_product.php?id=${id}`, { method: 'DELETE' })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            alert("Product deleted successfully!");
                            window.location.reload();
                        } else {
                            alert("Error deleting product.");
                        }
                    });
            }
        }

        // Handle form submission
        productForm.addEventListener('submit', (e) => {
            e.preventDefault();

            const formData = new FormData(productForm);
            const action = productIdInput.value ? 'update_product.php' : 'add_product.php';

            fetch(action, {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert(data.message);
                        window.location.reload();
                    } else {
                        alert(data.message);
                    }
                });
        });

        // Check database connection status
        async function checkDatabaseConnection() {
            const response = await fetch('?action=check_db_connection');
            const data = await response.json();
            const dbStatusIcon = document.getElementById('db-status-icon');
            dbStatusIcon.innerHTML = data.connected
                ? '<i class="fas fa-circle text-green-500"></i>'
                : '<i class="fas fa-circle text-red-500"></i>';
        }

        // On page load
        window.onload = () => {
            checkDatabaseConnection();
        };
    </script>

    <?php
    // Handle database connection check
    if (isset($_GET['action']) && $_GET['action'] === 'check_db_connection') {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "ecommerce";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            echo json_encode(['connected' => false]);
        } else {
            echo json_encode(['connected' => true]);
        }

        $conn->close();
        exit;
    }
    ?>
</body>

</html>