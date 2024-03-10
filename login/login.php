<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Login page</title>
    <link rel='stylesheet' href='login.css'>
</head>
<body>
    <div class="login-container">

        <div class="login-picture"></div>

        <div class="login-form">
           
            <div id="company-logo">
                <img src="logo-transformed.png" id="logo" alt="company-logo">
            </div>

            <div>
                <h2>
                    Welcome to <span>Eats Elite</span>
               </h2> <br>

               <h2>
                    Login <span>Here</span>
                </h2>

            </div>
            <br><br>
            
            <form id="loginForm" name="loginForm" action="../actions/login_user_action.php" method="POST">
                 <label for="username">Email or Username:</label><br>
                <input type="text" class="text-input" id="username" name="username" placeholder="john@example.com" required>
                <br><br>
    
                <label for="password">Password:</label><br>
                <input type="password" class="text-input" id="password" name="password" placeholder="********" required>
    
                <br> <br>
    
                <button type="submit" name="login-button" id="login-btn">LOGIN</button>
            </form>
            <br>
            <p class="sign-up">Don't have an account? <a href="../login/register.php">Sign up</a></p>
        </div>
    
    </div>
    <script src="../js/login.js"></script>
</body>
</html>
