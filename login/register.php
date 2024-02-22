<?php
session_start();
?>

<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Sign Up page</title>
    <link rel='stylesheet' href='../css/register.css'>
</head>
<body>
<h1>SIGN UP</h1>
<form action='../actions/register_user_action.php' method='POST' name='sign-up-form' id='sign-up-form'>
    <label for='fname'>First Name</label>
    <input placeholder='First Name' type='text' name='first-name-input' id='fname' required />

    <label for='lname'>Last Name</label>
    <input placeholder='Last Name' type='text' name='last-name-input' id='lname' required />

    <label for='male'>Male</label>
    <input type='radio' name='gender' id='male' value='0' />
    <label for='female'>Female</label>
    <input type='radio' name='gender' id='female' value='1' /><br><br>

    <label for='dob'>Date of Birth</label>
    <input placeholder='Date of Birth' type='date' name='date-of-birth' id='dob' required />

    <input placeholder='Address' type='text' name='address' id='address' required />

    <label for='tel'></label>
    <input placeholder='+233-XX-XXX-XXXX' type='tel' name='phone-number' id='tel' pattern='+233-[0-9]{2}-[0-9]{3}-[0-9]{4}' required/>

    <input placeholder='Email' type='email' name='email-input' id='email' required />
    <input placeholder='Password' type='password' name='password1' id='pwd1' required />
    <input placeholder='Confirm Password' type='password' name='password2' id='pwd2' required />

    <button type='submit' name='sign-up-button' id='sign-up-btn'>SIGN UP</button>
    <a href='../login/login.php'>login here</a>

</form>
<script src='../js/register.js'></script>
</body>
</html>
