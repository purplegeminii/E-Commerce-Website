<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login page</title>
    <link rel='stylesheet' href='../css/login.css'>
</head>
<body>
    <div class="top-banner">
        <p>Eats Elite</p>
    </div>
    <div class="login-container">
        <h2>Login</h2>
        <hr>
        <form id="loginForm" name="loginForm" action="../actions/login_user_action.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

<!--            <label for="remember">Remember Password:</label>-->
<!--            <input type="checkbox" id="remember" name="remember">-->

            <button type="submit" name="login-button" id="login-btn">Login</button>
        </form>
        <p id="error-message"></p>
<!--        <p class="forgot-password"><a href="#" onclick="forgotPassword()">Forgot Password?</a></p>-->
        <p class="sign-up">Don't have an account? <a href="../login/register.php">Sign up</a></p>
    </div>
    <script src="../js/login.js"></script>
</body>
</html>
