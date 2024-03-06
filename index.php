<?php
// header("location: login/login.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
    <link href='https://fonts.googleapis.com/css?family=Hammersmith One' rel='stylesheet'>
    <link rel="stylesheet" href="https://fontawesome.com/v5/icons/quote-left?f=classic&s=solid">
    <link rel="stylesheet" href="../css/home.css">
    <title>Homepage</title>
</head>
<body>
    <!-- Header -->
    <nav>
        <div class="header-container">
           <div class="logo">
                <!-- Logo goes here -->
                <a href="index.html"><img height="auto" width="60px" src="../assets/images/logo-transformed.png" alt="logo"></a>
           </div> 
            
                <ul id="menu">
                    <li><a href="#home">HOME</a></li>
                    <li><a href="#about-us">ABOUT US</a></li>
                    <li><a href="#reviews">OUR CUSTOMERS</a></li>
                    <li><a href="#contact-us">CONTACT US</a></li>
                    <li><a class="signup" href="login/register.php">SIGN UP</a></li>
                </ul>      
        </div>
    </nav>

    <!-- Menu Icon -->
    <div class="menuIcon">
        <span class="icon-bars"></span>
        <span class="icon-bars overlay"></span> 
    </div>
    
    <div class="overlay-menu">
        <ul id="menu">
            <li><a href="#home">HOME</a></li>
            <li><a href="#about-us">ABOUT US</a></li>
            <li><a href="#reviews">OUR CUSTOMERS</a></li>
            <li><a href="#contact-us">CONTACT US</a></li>
            <li><a class="signup" href="#">SIGN UP</a></li>
        </ul>
    </div>



    <!-- Content -->
    <section class="hero-section" id="home">
       <div id="hero-section">
            <h3 style="font-size: 28px;">Elite Eats</h3>

            <h1 style="font-size: 78px; letter-spacing: 22px;">GOOD FOOD<br>
                GOOD MOOD</H1>
       </div>
       
       <div id="hero-button">
        <button id="action-button"><a href="login/register.php">Dine With Us</a></button>
       </div>
    </section>


    <section class="about-us" id="about-us">
        <div id="about-pictures">
            <img id="about-picture1" src="../assets/images/about-pic1.jpg" alt="picture of jollof">
            <img id="about-picture2" src="../assets/images/about-pic2.jpg" alt="picture of boiled yam">

        </div>
        <div id="about-text">
            <h2>WELCOME <br>TO EATS ELITE</h2>
            <br>
            <p>
                Your one-stop destination for convenient online ordering from a 
                curated selection of the country's peculiar restaurants.
                Dive into a world of culinary excellence and enjoy the ease of
                bringing gourmet experiences right to your doorstep. 
                Explore. Order. Indulge.</p>
        </div>
    </section>
        
    <section class="reviews" id="reviews">
        <div id="heading">
            <h3>Reviews</h3>
        </div>
    
        <div id="review-container">
            <div id="review-1">
                <i class="fas fa-quote-left"></i>
                <p>
                    I never knew what I was missing until I tried Eats Elite.
                    The ease of ordering from top-tier restaurants without
                     having to book weeks in advance is a game-changer. 
                    It's like  having a personal concierge for your  taste buds!
                    <br><br><br>
                    - Naa Lamiorkor, Student
                </p>
            </div>
    
            <div id="review-2">
    
                <i class="fas fa-quote-left"></i>
                <p>
                    Eats Elite has completely transformed our dinner routines!
                    The variety and quality of restaurants available are simply unmatched.
                    Every meal ordered through their platform has been a culinary adventure. 
                    Fast delivery and fantastic customer service too!
                    <br><br>
                    - Zoe Akumia, Mother
                </p>
            </div>
        </div>
    </section>

    <section id="contact-us">
        <div id="contact-us-container">
            <div id="container-2">
                <div id="contact-images" >
                    <img id="contact-logo" src="../assets/images/Eats Elite Logo.png" alt="company logo"><br>
                    <div class="social-logos">
                        <img width="24" height="24" 
                        src="../assets/images/facebook--lgg.png" alt="facebook-new"/>
                        <img width="24" height="24" src="../assets/images/instagram--lg.png" alt="instagram-new--v1"/>                       
                        <img width="24" height="24" 
                        src="../assets/images/x--lg.png" alt="twitterx"/>
                    </div>
                </div>
    
                <div id="contact-text">
                    <div class="heading">
                        <h2>Eats Elite</h2>
                        <h4>COLLABORATE WITH US</h4><br><br>
                    <div id="contact-info">
                        <h2>Phone Number</h2>
                        <h4>+233 24 990 3683</h4>
                        <br><br>

                        <h2>Email Address</h2>
                        <h4>eatselite@gmail.com</h4>
                    </div>
                        </div>
                </div>
    
            </div>
        </div>
    </section>
</body>
<script src="../js/homepage-script.js">

</script>
</html>