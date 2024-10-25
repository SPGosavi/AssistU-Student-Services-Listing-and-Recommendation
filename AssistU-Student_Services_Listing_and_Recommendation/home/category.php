<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Category List</title>
    <link rel="stylesheet" href="category.css">

</head>
<body>
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
                <li id="contactus" class="links"><a href="#">Contact US</a></li>
                <li class="links"><a href="/review_page/review.html">Write a Review</a></li>
                <li><a id="loglink" href="/login/Login.html"><button id="logbt">Log In</button></li></a>
                <li><a id="reglink" href="/registration/register.html"><button id="regbt">Sign Up</button></a></li>
            </ul>
        </nav>
    </header>
    <h1>List of <?php echo ucfirst($_GET['category']);?></h1>
    <div class="list-container">
        <?php
        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "id21975537_navigate_db";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $category = $_GET['category'];

        $sql = "SELECT * FROM list_table WHERE type='$category'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<div class='item'>";
                echo "<img src='".trim($row["img"])."' alt='Image' width='200px' height='200px'>";
                echo "<div class='info'>";
                echo "<h2>" . $row["title"] . "</h2>";
                echo '<div class="star-rating">
                <span class="star" data-rating="1">&#9733;</span>
                <span class="star" data-rating="2">&#9733;</span>
                <span class="star" data-rating="3">&#9733;</span>
                <span class="star" data-rating="4">&#9733;</span>
                <span class="star" data-rating="5">&#9733;</span>
            </div>
            <button id="submitBtn" class="btn btn-primary mt-3">Submit</button>
        </div>';
                echo "<p>Price: $" . $row["price"] . "</p>";
                echo "<p>Location: " . $row["location"] . "</p>";
                echo "</div>";
                echo "</div>";
            }
        } else {
            echo "No items found.";
        }
        $conn->close();
        ?>
    </div>
</body>
</html>
