<?php
include "../actions/get_all_menu_items.php";
$menu = get_all_menu_items(1);
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
        <button class="category-button" data-category="meals">Meals</button>
        <button class="category-button" data-category="burgers">Burgers</button>
        <button class="category-button" data-category="desserts">Desserts</button>
        <button class="category-button" data-category="drinks">Drinks</button>
        <button class="category-button" data-category="streetwise">Streetwise</button>
        <button class="category-button" data-category="chicken-pieces-buckets">Chicken Pieces Buckets</button>
        <button class="category-button" data-category="sides">Sides</button>
    </div>

    <div class="menu-items">
        <div class="menu-item" data-category="chicken-pieces-buckets">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/4a782e78-65b5-6fca-d17e-16557fb91b22.jpeg?a=55c333ed-9876-7cea-8e88-4d4a3ca41b3b"
                 alt="15 PIECE BUCKET">
            <div class="menu-item-details">
                <h2 class="menu-item-name">15 PIECE BUCKET</h2>
                <p class="menu-item-price">$35.99</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>

            </div>
        </div>
        <div class="menu-item" data-category="chicken-pieces-buckets">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/a9c83d0f-0536-f9e6-2c61-27dcc5de5f1d.jpeg?a=d8845b48-22d4-d598-ab34-5a6169e006c2"
                 alt="9 PIECE BUCKET">
            <div class="menu-item-details">
                <h2 class="menu-item-name">9 PIECE BUCKET</h2>
                <p class="menu-item-price">$29.99</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>

            </div>
        </div>
        <div class="menu-item" data-category="chicken-pieces-buckets">
            <img src="https://cdn.tictuk.com/473c0973-02b4-b017-a15f-0c362258e55e/85b44ff5-6d5c-797a-d2b5-a990a0a2fcde.jpeg?a=b5833e38-5e03-ee01-3782-8559f4927438"
                 alt="BONELESS BUCKET MEAL">
            <div class="menu-item-details">
                <h2 class="menu-item-name">BONELESS BUCKET MEAL</h2>
                <p class="menu-item-price">$27.99</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>

            </div>
        </div>

        <div class="menu-item" data-category="burgers">
            <img src="https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/7f0f3595-8cf0-7f51-cdba-b9d1d4f8b395.jpeg?a=26240c8d-fdee-109f-f2eb-afbb497d669c"
                 alt="VEG BURGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">VEG BURGER</h2>
                <p class="menu-item-price">Price: $10.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="burgers">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/703d98b3-6281-6792-c7cf-58e9fa91b552.jpeg?a=55bd0f18-6e8a-ee25-53ff-ce0e0b206228"
                 alt="ZINGER TOWER BURGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">ZINGER TOWER BURGER</h2>
                <p class="menu-item-price">Price: $4.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="burgers">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/2fb37018-d420-827b-e655-b0323da0dd67.jpeg?a=ed0acee3-3326-3326-4c88-c297f73a8574"
                 alt="CRUNCH BURGER - ZINGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">CRUNCH BURGER - ZINGER</h2>
                <p class="menu-item-price">Price: $9.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="burgers">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/ccb74601-58cc-156a-3e6a-9f8ba789fe90.jpeg?a=9fa119cf-bfc8-b92e-18fa-79aea52439c4"
                 alt="COLONEL TOWER BURGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">COLONEL TOWER BURGER</h2>
                <p class="menu-item-price">Price: $9.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="meals">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/397a93d4-3560-f18d-51bb-aa249233062a.jpeg?a=4fc1a0e2-a75a-e164-38ba-6a21a6ccb33b"
                 alt="BURGER MEAL - ZINGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">BURGER MEAL - ZINGER</h2>
                <p class="menu-item-price">Price: $7.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="meals">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/974a85e0-5402-3972-5ecc-b5361120d21d.jpeg?a=540a83b1-f5e9-4940-7339-bb1c4853370f"
                 alt="BOX MASTER ZINGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">BOX MASTER ZINGER</h2>
                <p class="menu-item-price">Price: $8.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="meals">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/28dd573b-f5ce-877d-2c06-3041d5a803a3.jpeg?a=799af0c6-b4cb-d8b2-c88b-aa26d5067b66"
                 alt="TWISTER MEAL - ZINGER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">TWISTER MEAL - ZINGER</h2>
                <p class="menu-item-price">Price: $8.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="meals">
            <img src="https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/3ad6bb04-a5e6-6568-2997-fcb5319e3d83.jpeg?a=26c629e1-3672-736f-4cae-466483113b0c"
                 alt="FAMILY TREAT">
            <div class="menu-item-details">
                <h2 class="menu-item-name">FAMILY TREAT</h2>
                <p class="menu-item-price">Price: $12.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="desserts">
            <img src="https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/21c76f04-2697-4296-e7c8-52c918ba9f7c.jpeg?a=c59aca31-7653-a168-3e7a-cfa3afbaad19"
                 alt="REGULAR OREO KRUSHER">
            <div class="menu-item-details">
                <h2 class="menu-item-name">REGULAR OREO KRUSHER</h2>
                <p class="menu-item-price">Price: $5.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="desserts">
            <img src="https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/a6c138fe-efd3-d786-1207-c6d664a0ec59.jpeg?a=5a2db7f1-c516-c6d9-523f-fb8a7342c66e"
                 alt="REGULAR BERRY KRUSHERS">
            <div class="menu-item-details">
                <h2 class="menu-item-name">REGULAR BERRY KRUSHERS</h2>
                <p class="menu-item-price">Price: $4.25</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="desserts">
            <img src="https://cdn.tictuk.com/2df0b3fc-3555-d893-fd12-dedb0d869bf1/2e5f0fb9-87b2-288e-32b7-8959e7034321.jpeg?a=83412a80-0137-c06a-43e5-c2c88dc1d3c4"
                 alt="STRAWBERRY MILKSHAKE">
            <div class="menu-item-details">
                <h2 class="menu-item-name">STRAWBERRY MILKSHAKE</h2>
                <p class="menu-item-price">Price: $4.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="streetwise">
            <img src="https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/5b9d5be1-481c-5a4c-40d9-6aa4bfc27c58.jpeg?a=6389423d-c937-d721-fb5f-500fe19c4390"
                 alt="STREETWISE 5">
            <div class="menu-item-details">
                <h2 class="menu-item-name">STREETWISE 5</h2>
                <p class="menu-item-price">Price: $30.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="streetwise">
            <img src="https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/55546442-bb6f-9358-e2fa-9a31bc38353e.jpeg?a=1bf05753-12cc-9387-3b4a-c6c170a65eba"
                 alt="STREETWISE 3">
            <div class="menu-item-details">
                <h2 class="menu-item-name">STREETWISE 3</h2>
                <p class="menu-item-price">Price: $28.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="streetwise">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/0b62bc94-58ee-8421-debb-37fb976b9046.jpeg?a=e49fd613-c228-4311-aa24-b62deed1265b"
                 alt="STREETWISE 2">
            <div class="menu-item-details">
                <h2 class="menu-item-name">STREETWISE 2</h2>
                <p class="menu-item-price">Price: $24.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="drinks">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/43500061-a98e-ccbb-3ad4-39dd6471da72.jpeg?a=731c930f-0f4b-1df2-7b9a-1e32f462301c"
                 alt="COCA COLA 300ML">
            <div class="menu-item-details">
                <h2 class="menu-item-name">COCA COLA 300ML</h2>
                <p class="menu-item-price">Price: $5.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="drinks">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/1ac232fb-42d1-3fad-fe78-21b0df08268e.jpeg?a=a30671f4-0aab-a7ce-cd97-b31a6c3e1ffb"
                 alt="FANTA 300ML">
            <div class="menu-item-details">
                <h2 class="menu-item-name">FANTA 300ML</h2>
                <p class="menu-item-price">Price: $5.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="drinks">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/9d22f7a7-d8bc-7ee7-719e-5e9329c0cf7c.jpeg?a=ae0fce51-d74a-0822-a127-2fb083140c4c"
                 alt="SPRITE 300ML">
            <div class="menu-item-details">
                <h2 class="menu-item-name">SPRITE 300ML </h2>
                <p class="menu-item-price">Price: $5.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="drinks">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/c31f0521-37fc-cacb-3ea0-ecd88d9e0619.jpeg?a=4badb2fa-a876-5adf-e3c8-1b37ba697f40"
                 alt="WATER 500ML">
            <div class="menu-item-details">
                <h2 class="menu-item-name">WATER 500ML</h2>
                <p class="menu-item-price">Price: $1.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="sides">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/ada462d4-5b3f-95ae-9a41-bf78289118ec.jpeg?a=283b0e6e-274d-e8a3-ff97-642fe3270dc2"
                 alt="EXTRA HASH BROWN">
            <div class="menu-item-details">
                <h2 class="menu-item-name">EXTRA HASH BROWN</h2>
                <p class="menu-item-price">Price: $5.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="sides">
            <img src="https://cdn.tictuk.com/82a4add3-65fc-52b9-9408-0726b13919cb/1756be6c-3923-7fb0-307f-5325393c39de.jpeg?a=b36ae5a3-38c2-20c2-9a11-de2ccb94f010"
                 alt="LARGE CHIPS">
            <div class="menu-item-details">
                <h2 class="menu-item-name">LARGE CHIPS</h2>
                <p class="menu-item-price">Price: $2.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
        <div class="menu-item" data-category="sides">
            <img src="https://cdn.tictuk.com/staging/fc9ab8a5-b3d3-4cf6-0e30-555e691086bf/0b211eb9-37c1-295e-1d3c-038828392bc9.jpeg?a=91ea4ae1-262f-d342-6fe3-74a0639c16df"
                 alt="ZINGER DRIP SAUCE">
            <div class="menu-item-details">
                <h2 class="menu-item-name">ZINGER DRIP SAUCE</h2>
                <p class="menu-item-price">Price: $3.00</p>
                <button class="add-to-cart-button"><a href="added_cart_page.html">Add to Cart</a></button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="../js/kfcMenu.js"></script>
</body>

</html>