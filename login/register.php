<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sign Up Page</title>
    <link rel='stylesheet' href='../css/register.css'>
</head>
<body>
    <div class="sign-up-container">

        <div class="sign-up-form">
           
            <div id="company-logo">
                <img src="../assets/images/logo-transformed.png" id="logo" alt="company-logo">
            </div>

            <div>
                <h2>
                    REGISTER WITH <span>EATS ELITE</span>
                </h2>
            </div>

            <form action='../actions/register_user_action.php' method='POST' name='sign-up-form' id='sign-up-form'>
                <label for="fname">FIRST NAME:</label><br>
                <input placeholder='First Name' type='text' name='first-name-input' id='fname' required />
                <br>

                <label for="lname">LAST NAME:</label><br>
                <input placeholder='Last Name' type='text' name='last-name-input' id='lname' required />

                <label for='male'>MALE</label><input type='radio' name='gender' id='male' value='Male' /><br>
                <label for='female'>FEMALE</label><input type='radio' name='gender' id='female' value='Female' /><br><br>

                <label for='tel'>TELPHONE:</label>
                <input placeholder='+233-XXX-XXX-XXX' type='tel' name='phone-number' id='tel' pattern='+233-[0-9]{2}-[0-9]{3}-[0-9]{4}' required/>

                <label for='tel'>EMAIL:</label>
                <input placeholder='EMAIL' type='email' name='email-input' id='email' required />

                <label for='tel'>PASSWORD:</label>
                <input placeholder='PASSWORD' type='password' name='password1' id='pwd1' required />

                <label for='tel'>CONFIRM PASSWORD:</label>
                <input placeholder='CONFIRM PASSWORD' type='password' name='password2' id='pwd2' required />

                <button type='submit' name='sign-up-button' id='sign-up-btn'>SIGN UP</button><br>
                
                <p class="sign-up">Already have an account? <a href='login.php'>Login Here</a></p>

</form>

<script src='../js/register.js'></script>
</body>
</html>
