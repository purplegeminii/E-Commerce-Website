<?php
session_start();
include "../functions/get_cart_items.php";
include "../functions/get_total_price.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
<div class="header">

    <nav>
        <div class="header-container">
            <div class="logo">
                <!-- Logo goes here -->
                <img height="60px" width="auto" src="../assets/images/logo-transformed.png" alt="logo">
                <h1 class="menu-title">Cart</h1>
            </div>


            <ul id="menu">
                <li><a href="../view/restaurants.php">Restaurants</a></li>
                <li><a href="../view/cart.php"><i class="ri-shopping-cart-2-fill"></i> Cart</a> </li>
                <div class="dropdown">
                    <li><a href="#"><i class="ri-user-3-fill"></i> USER</a></li>
                    <div class="dropdown-content">
                        <a href="../login/logout.php"><i class="ri-logout-box-fill"></i>Logout</a>
                    </div>
                </div>
            </ul>
        </div>
    </nav>
</div>


    <main>
        <section class="cart">
            <h2>Your Cart</h2><a href="../menu/kfcMenu.php">Continue shopping</a>
            <hr>
            <div class="cart-items">
                <?php
                if (isset($_SESSION['order_id'])) {
                    $order_id = $_SESSION['order_id'];
                    $cartItems = get_cart_items($order_id);
                ?>
                    <?php foreach ($cartItems as $item): ?>
                        <div class="cart-item">
                            <img src="<?= $item['Item_Image'] ?>" alt="<?= $item['Item_Name'] ?>">
                            <div class="item-details">
                                <p><?= $item['Item_Name'] ?></p>
                                <div class="quantity-section">
                                    <a href="../functions/update_quantity.php?order_item_id=<?= $item['Order_Item_ID'] ?>&action=minus&qty=<?= $item['Quantity'] ?>">
                                        <button class="quantity-btn" data-action="minus">-</button>
                                    </a>
                                    <p class="quantity"><?= $item['Quantity'] ?></p>
                                    <a href="../functions/update_quantity.php?order_item_id=<?= $item['Order_Item_ID'] ?>&action=plus&qty=<?= $item['Quantity'] ?>">
                                        <button class="quantity-btn" data-action="plus">+</button>
                                    </a>
                                </div>
                                <p>Unit Price: $<?= $item['Item_Price'] ?></p>

                                <a href="../actions/remove_from_cart.php?order_item_id=<?= $item['Order_Item_ID'] ?>">
                                    <button class="remove-item">Remove</button>
                                </a>

                            </div>

                        </div>
                    <?php endforeach; ?>
                <?php } else {
                    echo "<h1>No Item in the cart yet</h1>";
                } ?>
            </div>
            <hr>
            <div class="cart-total">
                <?php
                    if (isset($_SESSION['order_id'])) {
                        $order_id = $_SESSION['order_id'];
                        $total_price = get_order_total_price($order_id);
                        if ($total_price !== null) {
                            echo "<p>Total Price: $" . $total_price . "</p>";
                            echo "<p>Taxes and shipping calculated at checkout</p>";
                            echo "<a href='../actions/checkout_order.php?order_id=" . $order_id . "'><button class='checkout-button'>Checkout</button></a>";
                        } else {
                            echo "<p>Total Price: $0.00</p>";
                            echo "<p>Taxes and shipping calculated at checkout</p>";
                            echo "<button class='checkout-button' disabled='disabled' style='background-color: gray'>Checkout</button>";
                        }
                    } else {
                        echo "<p><strong>Total Price:</strong> $0.00</p>";
                        echo "<p>Taxes and shipping calculated at checkout</p>";
                        echo "<button class='checkout-button' disabled='disabled' style='background-color: gray'>Checkout</button>";
                    }
                ?>
            </div>
        </section>
    </main>
<!--    <script src="../js/cart.js"></script>-->
</body>
</html>
