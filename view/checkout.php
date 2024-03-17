<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="../css/checkout.css">

</head>
<body>

<div class="container">

    <form action="../actions/pay_for_order.php" method="POST">
        <div class="row">
            <div class="col">
                <h3 class="title">Billing Address</h3>
                <div class="inputBox">
                    <span>full name :</span>
                    <input type="text" required>
                </div>
                <div class="inputBox">
                    <span>email :</span>
                    <input type="email" required>
                </div>
                <div class="inputBox">
                    <span>address :</span>
                    <input type="text" required>
                </div>
                <div class="inputBox">
                    <span>city :</span>
                    <input type="text" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>state :</span>
                        <input type="text" required>
                    </div>
                    <div class="inputBox">
                        <span>zip code :</span>
                        <input type="text"required>
                    </div>
                </div>

            </div>

            <div class="col">

                <h3 class="title">Payment</h3>

                <div class="inputBox">
                    <span>cards accepted :</span>
                    <img src="../assets/images/card_img.png" alt="">
                </div>
                <div class="inputBox">
                    <span>name on card :</span>
                    <input type="text" required>
                </div>
                <div class="inputBox">
                    <span>credit card number :</span>
                    <input type="number" required>
                </div>
                <div class="inputBox">
                    <span>exp month :</span>
                    <input type="text" required>
                </div>

                <div class="flex">
                    <div class="inputBox">
                        <span>exp year :</span>
                        <input type="number" required>
                    </div>
                    <div class="inputBox">
                        <span>CVV :</span>
                        <input type="text" required>
                    </div>
                </div>

            </div>

        </div>

        <input type="submit" value="Pay Now" class="submit-btn" id="pay-button" name="pay-button">
        <a href="../functions/cancel_order.php">
            <button name="cancel-button" id="cancel-button">Cancel</button>
        </a>

    </form>

</div>
<script src="../js/checkout.js"></script>

</body>
</html>