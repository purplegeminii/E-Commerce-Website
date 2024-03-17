<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link
    href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">

        <div class="navbar">
            <div id="navbar-container">
                <div class="platform">
                    <img src="assets/images/logo-transformed.png" height=40px alt="">
                    <h2>Eats Elite</h2>
                </div>
                
                
                <div id="profile">
                    <div class="img-container" >
                        <div class="img-border">
                            <img class="profile-pic" src="assets/images/KFC-img.png"  alt="profile">
                      </div>
                    </div>
                    <!-- set to be round and possibly a change pic function -->
                    <div class="profile-text">
                        <p>Welcome Back</p>
                    <h4>Kentucky Fried Chicken (KFC)</h4>
                    </div>
                    <br>
                </div>
                
                <div class="buttons">
                    <a href="#">
                        <button class="nav-btn"><i class="ri-dashboard-line"></i> Dashboard </button></a>
                    <br>
                    <a href="#">
                        <button class="nav-btn"> <i class="ri-logout-box-line"></i> Logout  </button>
                    </a>
                </div>
    

            </div>

        </div>
    
        <div class="content">
            
           <div id="heading">
            <h3>Dashboard</h3>
            <p> Sales Update</p>
           </div>
            
           
           <hr>
            <section class="data-summary">
                <div class="stat-box">
                    <div class="day">
                        <h5>Sold Today</h5>
                        <p> 23</p>
                    </div>

                    <div class="week">
                        <h5>Sold This Week</h5>
                        <p> 48</p>
                    </div>

                    <div class="month">
                        <h5>Sold This Month</h5>
                        <p> 73</p>
                    </div>
                </div>
                
            </section>

            <section class="meals">
                <div id=" meals">
                    <div class="header">
                        <h3>Meals </h3>
                        <div class="meal-search"> 
                            <i class="ri-search-line"></i>
                            <input type="text" id="search-bar">
                        </div>
                    </div>

                    <table id="meals-table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Category</th>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Drinks</td>
                                <td>Coke</td>
                                <td>$5.00</td>
                                <td>
                                    <i class="ri-delete-bin-6-line"></i>
                                    <i class="ri-edit-line"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Snacks</td>
                                <td>Chips</td>
                                <td>$3.00</td>
                                <td>
                                    <i class="ri-delete-bin-6-line"></i>
                                    <i class="ri-edit-line"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Desserts</td>
                                <td>Ice Cream</td>
                                <td>$4.50</td>
                                <td>
                                    <i class="ri-delete-bin-6-line"></i>
                                    <i class="ri-edit-line"></i>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Appetizers</td>
                                <td>Mozzarella Sticks</td>
                                <td>$6.00</td>
                                <td>
                                    <i class="ri-delete-bin-6-line"></i>
                                    <i class="ri-edit-line"></i>
                                </td>
                            </tr>
                        </tbody>                        
                   </table>
    
                </div>
            </section>

        </div>

    </div>
</body>
</html>