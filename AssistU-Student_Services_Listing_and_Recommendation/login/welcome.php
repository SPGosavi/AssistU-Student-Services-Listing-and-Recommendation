<?php
session_start();

if(!isset($_SESSION['loggedin'])|| $_SESSION['loggedin']!=true)
{
    header("location: login.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assist You - Home</title>
    <link rel="stylesheet" href="welcome.css">
 
</head>
<body>
    <div class="bg">
        <img id="bgimg" src="../laundry.webp" alt="laundry">
    <div class="loadbar">
        <div class="bars"></div>
        <div class="bars"></div>
        <div class="bars"></div>
        <div class="bars"></div>
    </div>
    <div class="secbar">
        <div id="bar1" class="sbars"></div>
        <div id="bar2" class="sbars"></div>
        <div id="bar3" class="sbars"></div>
        <div id="bar4" class="sbars"></div>
    </div>

    <div class="webinfo">
       <div class="wlc">
        <h1>Welcome </h1>
        <h2><img src="../name.png" alt="Logo"></h2>
    </div> 
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi esse qui, quas odio inventore quibusdam modi soluta, nam sed doloremque quisquam obcaecati repellat nobis totam?</p>
    </div>
   
    </div>
    <header>
        <nav class="nav">
            <ul class="list">
                <li><div class="logo">
                    <img id="logo" src="../l1.png" alt="logo">
                    <img id="lname" src="../name.png" alt="name">
                </div></li>
                <div id="search">
                    
                    <input readonly class="search-input1" type="search" placeholder="Services">
                    <div id="dropdown-menu1" class="dropdown-content1">
                        <!-- Dropdown content goes here -->
                        <a onclick="redirectToCategory('mess')"> <img width="20px" src="../laundry.png" alt="laundry"> Mess</a>
                        <a onclick="redirectToCategory('pg')"><img width="20px" src="../laundry.png" alt="laundry">PG</a>
                        <a onclick="redirectToCategory('laundry')"><img width="20px" src="../laundry.png" alt="laundry">Laundry</a>
                        <a onclick="redirectToCategory('hospital')"><img width="20px" src="../laundry.png" alt="laundry">Medical</a>
                    </div>
                    <span></span>
                    <input readonly class="search-input2" type="search" placeholder="Location">
                    <div id="dropdown-menu2" class="dropdown-content2">
                        <!-- Dropdown content goes here -->
                        <a href="#">Dr. D. Y. Patil Institute of Technology</a>
                        <a href="#">Dr. D. Y. Patil Medical College</a>
                    </div>
                    <div class="icon">
                        <span class="search-icon"><img width="60px" src="../search.png" alt=""></span>
                    </div>
                </div>
                <li id="contactus" class="links"><a hdref="#">Contact US</a></li>
                <li class="links"><a href="/review_page/review.html">Write a Review</a></li>
                
                
                
                <div class="prof">
    <img width="80px" src="../user.png" alt="">
    <p id="uname"><?php echo $_SESSION['name'];?></p>
    <div id="popup" class="popup">
        <div class="popup-content">
            <a href="logout.php" class="logout-btn">Logout</a>
        </div>
    </div>
</div>
            </ul>
        </nav>
    </header>
<main>

</main>
    <footer class="footer">

    </footer>
    <script src="welcome.js">
        
    </script>
</body>
</html>
