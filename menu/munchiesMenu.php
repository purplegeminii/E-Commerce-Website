<?php
global $conn;
include "../settings/core.php";
include "../actions/get_all_menu_items.php";
include "../actions/get_all_categories.php";
$menu = get_all_menu_items(1);
$categories = get_all_categories(1);
mysqli_close($conn);
$_SESSION['rest_id'] = 1;
$_SESSION['rest_url'] = '../menu/kfcMenu.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Munchies Online</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/kfcMenu.css">
</head>

<body>
    <div class="header">

        <nav>
            <div class="header-container">
                <div class="logo">
                    <!-- Logo goes here -->
                    <img height="60px" width="auto" src="../assets/images/munchies-trans.png" alt="logo">
                    <h1 class="menu-title">Munchies Menu</h1>
                </div>


                <ul id="menu">
                    <li><a href="../view/restaurants.php">RESTAURANTS</a></li>
                    <li><a href="../view/cart.php"><i class="ri-shopping-cart-2-fill"></i> CART</a> </li>
                    <div class="dropdown">
                        <li><a href="#"><i class="ri-user-3-fill"></i> USER</a></li>
                        <div class="dropdown-content">
                            <a href="../login/logout.php"><i class="ri-logout-box-fill"></i>LOGOUT</a>
                        </div>
                    </div>
                </ul>
            </div>
        </nav>
    </div>

    <div id="main" class="menu-container">
        <div class="category-buttons">
            <?php foreach ($categories as $category): ?>
            <button class="category-button" data-category="<?php echo $category['name'];?>"><?php echo $category['name'];?></button>
            <?php endforeach; ?>
        </div>

        <div class="menu-items">
            <?php foreach ($menu as $item): ?>
            <div class="menu-item" data-category="<?= $item['Category'];?>">
                <img src="<?= $item['Img_src'] ?>" alt="<?= $item['Name'] ?>">
                <div class="menu-item-details">
                    <h2 class="menu-item-name"><?= $item['Name']?></h2>
                    <p class="menu-item-price">$<?= $item['Price']?></p>
                    <a href="../actions/add_to_cart.php?item_id=<?= $item['Item_ID'] ?>">
                        <button class="add-to-cart-button" data-item-id="<?= $item['Item_ID'] ?>">Add to Cart</button>
                    </a>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/kfcMenu.js"></script>
</body>

</html>