<?php
include "../actions/get_all_menu_items.php";
include "../actions/get_all_categories.php";
$menu = get_all_menu_items(1);
$categories = get_all_categories(1);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KFC Menu</title>
    <link rel="stylesheet" href="../css/kfcMenu.css">
</head>

<body>
    <div class="header">
        <h1>KFC Menu</h1>
        <div class="line"></div>
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
                    <button class="add-to-cart-button"><a href="../view/cart_page.php?id=<?= $item['Item_ID'] ?>">Add to Cart</a></button>
                </div>
            </div>
            <?php endforeach; ?>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="../js/kfcMenu.js"></script>
</body>

</html>