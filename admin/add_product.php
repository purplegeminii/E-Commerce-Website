<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/management.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/add_product.css">
    <title>Product Management</title>
</head>

<body>
    <div class="container">

        <div class="navbar">
            <div id="navbar-container">
                <div class="platform">
                    <img src="../assets/images/logo-transformed.png" height=40px alt="logo">
                    <h2>Eats Elite</h2>
                </div>


                <div id="profile">
                    <div class="img-container">
                        <div class="img-border">
                            <img class="profile-pic" src="../assets/images/KFC-img.png" alt="profile">
                        </div>
                    </div>
                    <div class="profile-text">
                        <p>Welcome Back</p>
                        <h4>Kentucky Fried Chicken (KFC)</h4>
                    </div>
                    <br>
                </div>

                <div class="buttons">
                    <a href="dashboard.php">
                        <button class="nav-btn"><i class="ri-dashboard-line"></i> Dashboard </button></a>
                    <br>
                    <a href="management.php">
                        <button class="nav-btn"><i class="ri-edit-box-line"></i> Product Management </button></a>
                    <br>
                    <a href="add_product.php">
                        <button class="nav-btn"> <i class="ri-logout-box-line"></i> Add Product </button>
                    </a>
                    <br>
                    <a href="edit_product.php">
                        <button class="nav-btn"> <i class="ri-edit-line"></i> Edit Product </button>
                    </a>
                    <br>
                    <a href="../login/logout.php">
                        <button class="nav-btn"> <i class="ri-logout-box-line"></i> Logout </button>
                    </a>
                </div>


            </div>

        </div>

        <div class="content">
            <div class="heading-container">
                <div id="heading">
                    <h3>Product Management</h3>
                    <p>Manage Product</p>
                </div>
                <div class="dashboard-section">
                    <h2>Create New Product</h2>
                    <form action="../actions/add_product_action.php" method="post" id="productForm" name="productForm">
                        <label for="productName">Product Name:</label>
                        <input type="text" id="productName" name="productName" placeholder="Enter product name" required>
                        <button type="submit" id="createproductBtn" name="createproductBtn">Add Product</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</body>

</html>