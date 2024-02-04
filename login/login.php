<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login page</title>
    <link rel='stylesheet' href='../css/login.css'>
</head>
<body>
    <h1>LOGIN</h1>
    <form action='../actions/login_user.php' method='post' name='login-page-form' id='login-form'>
        <input placeholder='Email' type='email' name='email-input' id='email' required />
        <input placeholder='Password' type='password' name='password-input' id='pwd' required />
        <button type='submit' name='login-button' id='login-btn'>SIGN IN</button>
        <a href='../login/register.php'>register here</a>
    </form>
    <script src='../js/login.js'></script>
</body>
</html>
