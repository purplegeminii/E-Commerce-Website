<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../css/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.2.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <title>Dashboard</title>
</head>
<body>
    <div class="container">

        <div class="navbar">
            <div id="navbar-container">
                <div class="platform">
                    <img src="../assets/images/logo-transformed.png" height=40px alt="">
                    <h2>Eats Elite</h2>
                </div>
                
                
                <div id="profile">
                    <div class="img-container" >
                        <div class="img-border">
                            <img class="profile-pic" src="../assets/images/KFC-img.png"  alt="profile">
                      </div>
                    </div>
                    
                    <div class="profile-text">
                        <p>Welcome Back</p>
                    <h4>Kentucky Fried Chicken (KFC)</h4>
                    </div>
                    <br>
                </div>
                
                <div class="buttons">
                    <a href="dashboard.php">
                        <button class="nav-btn"><i class="ri-dashboard-line"></i> Dashboard </button></a>
                    <br>
                    <a href="management.php">
                        <button class="nav-btn"><i class="ri-edit-box-line"></i> Product Management </button></a>
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

            <section class="chart-summary">
                <div class="header">
                    <h3>Summary</h3>
                </div>
                <div class="chartCard">
                    <div class="chartBox">
                        <canvas id="myChart"></canvas>
                        <div class="filter-buttons">
                            <button id="filter-btn" onclick="dateFilter('hour')">Hour</button>
                            <button id="filter-btn" onclick="dateFilter('day')">Day</button>
                            <button id="filter-btn" onclick="dateFilter('month')">Month</button>
                            <button id="filter-btn" onclick="dateFilter('year')">Year</button>
                        </div>
                    </div>
                </div>
                


            </section>
        </div>
    </div>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="../js/chart.js"></script>

</body>
</html> 
