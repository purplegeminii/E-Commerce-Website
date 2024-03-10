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
                <div class="cart-item">
                    <img src="../images/Burger.jpg" alt="Burger">
                    <div class="item-details">
                        <p>Vegan Spicy Burger</p>
                        <p>Quantity: 1</p>
                        <p>Price: $5.99</p>
                    </div>
                    <button class="remove-item">Remove</button>
                </div>
                <!-- More cart items can be added here -->
            </div>
            <hr>
            <div class="cart-total">
                <p>Subtotal: $5.99</p>
                <p>Taxes and shipping calculated at checkout</p>
                <button class="checkout-button">Checkout</button>
            </div>
        </section>
    </main>
    <footer>
        <p>&copy; 2024 Eats Elite</p>
    </footer>
</body>
</html>
