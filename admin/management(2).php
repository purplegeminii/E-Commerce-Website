<?php
include "../functions/get_menu_items.php";

if (get_menu_items()) {
    $menuItems = get_menu_items();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/management.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Product Management</title>
    <style>
        #meals-table {
            width: 100%;
            border-collapse: collapse;
        }

        #meals-table th,
        #meals-table td {
            border: none;
            padding: 8px;
            text-align: left;
        }

        #meals-table th {
            background-color: transparent;
        }

        #meals-table a {
            color: #fb4a0a;
        }
    </style>
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
                    <!-- set to be round and possibly a change pic function -->
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
                    <a href="edit_menu_item.php">
                        <button class="nav-btn"> <i class="ri-edit-line"></i> Edit Menu </button>
                    </a>
                    <br>

                    <a href="../login/logout.php">
                        <button class="nav-btn"> <i class="ri-logout-box-line"></i> Logout </button>
                    </a>
                </div>


            </div>

        </div>

        <div class="content">

            <div id="heading">
                <h3>Product Management</h3>
                <p> Manage Product</p>
            </div>


            <section class="meals">
                <div id=" meals">
                    <div class="header">
                        <h3>Meals </h3>
                        <div class="meal-search">
                            <i class="ri-search-line"></i>
                            <input type="text" id="search-bar">
                        </div>
                    </div>

                    <table id="meals-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($menuItems as $item) : ?>
                                <tr>
                                    <td><?= $item['Item_ID'] ?></td>
                                    <td><?= $item['Category'] ?></td>
                                    <td><?= $item['Name'] ?></td>
                                    <td><?= $item['Price'] ?></td>
                                    <td>
                                        <a href="../actions/delete_menu_actions.php?id=<?= $item['Item_ID'] ?>"><i class="ri-delete-bin-6-line"></i></a>
                                        <a href="../actions/edit_menu_action.php?id=<?= $item['Item_ID'] ?>"><i class="ri-edit-line"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </section>

        </div>

    </div>
</body>

</html>