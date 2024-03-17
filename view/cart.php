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
    <link rel="stylesheet" href="../css/cart.css">
</head>
<body>
    <header>
        <div class="logo-container">
            <img src="../images/Eats Elite Logo.jpg" alt="Eats Elite">
            <h1>Eats Elite</h1>

            <nav>
                <ul>
                    <li><a href="../index.php">Home</a></li>
                    <li><a href="../menu/kfcMenu.php">Menu</a></li>
                    <li><a href="../view/cart.php">Cart</a></li>
                </ul>
            </nav>
        </div>

    </header>
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
                            </div>
                            <a href="../actions/remove_from_cart.php?order_item_id=<?= $item['Order_Item_ID'] ?>">
                                <button class="remove-item">Remove</button>
                            </a>
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
                        echo "<p>Total Price: $0.00</p>";
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
