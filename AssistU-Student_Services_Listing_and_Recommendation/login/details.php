<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="details1.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
       .star {
    color: #ccc; /* Default color for empty stars */
    font-size: 40px;
}

.star.filled {
    color: #ffc107; /* Color for full stars */
}

.star.half {
    color: #ffc107; /* Color for half stars, if you're using them */
    position: relative;
}

.star.half::after {
    content: "\2605"; /* Unicode for a half star */
    position: absolute;
    width: 50%;
    overflow: hidden;
    color: #ffc107; /* Ensure the half star is the correct color */
}

        </style>
</head>
<script src="details1.js"></script>
<body>
    
</body>
</html>

<?php


$getId=$_GET['categoryId'];
$categoryId=explode('_',$getId)[1];

        $host = "localhost";
        $username = "root";
        $password = "";
        $database = "id21975537_navigate_db";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        $sql = "SELECT * FROM list_table WHERE id='$categoryId'";
        $result = $conn->query($sql);
        echo '<div class="main">';
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="item" id="div_'.$row['id'].'">';
                echo '<div class="images">';
                echo "<img  src='".trim($row["img"])."' alt='Image' >";
                echo "</div>";
                echo "<div class='info'>";
                echo "<h2>" . $row["title"] . "</h2>";

                $conn = new mysqli($host, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $category = $_GET['category']; 
                
                if(strcmp($category,"mess")==0)
                {
                    
                    $sql = "SELECT * FROM list_table WHERE type=? AND title=?";
                    $stmt = $conn->prepare($sql);
                    if ($stmt) {
                        $stmt->bind_param("ss", $category, $row['title']);
                        $stmt->execute();
                        $res = $stmt->get_result();
                        // Rest of your code
                    } else {
                        echo "Error in preparing SQL statement: " . $conn->error;
                    }
                   if ($res->num_rows > 0) {
                       while($row1 = $res->fetch_assoc()) {
                           $mess_name=$row1["title"];
    
                           $avgRatingSql = "SELECT AVG(overall_rating) as average_rating FROM mess_ratings WHERE mess_name='$mess_name'";
       
                       $avgRatingResult = $conn->query($avgRatingSql);
                       if ($avgRatingResult->num_rows > 0) {
                           $avgRatingRow = $avgRatingResult->fetch_assoc();
                           $averageRating = $avgRatingRow['average_rating'];
                           // Display the mess name and its average rating
                           echo "<div class='mess-info'>";

                           displayStars($averageRating);
                           echo "</div>";
                   }
                }
               }
            }
            if(strcmp($category,"laundry")==0)
            {
                
                $sql = "SELECT * FROM list_table WHERE type=? AND title=?";
                $stmt = $conn->prepare($sql);
                if ($stmt) {
                    $stmt->bind_param("ss", $category, $row['title']);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    // Rest of your code
                } else {
                    echo "Error in preparing SQL statement: " . $conn->error;
                }
               if ($res->num_rows > 0) {
                   while($row1 = $res->fetch_assoc()) {
                       $laundry_name=$row1["title"];
   
                       $avgRatingSql = "SELECT AVG(overall) as average_rating FROM laundry_ratings WHERE laundry_name='$laundry_name'";
   
                   $avgRatingResult = $conn->query($avgRatingSql);
                   if ($avgRatingResult->num_rows > 0) {
                       $avgRatingRow = $avgRatingResult->fetch_assoc();
                       $averageRating = $avgRatingRow['average_rating'];
                       // Display the mess name and its average rating
                       echo "<div class='mess-info'>";

                       displayStars($averageRating);
                       echo "</div>";
               }
            }
           }
        }
        if(strcmp($category,"pg")==0)
        {
            
            $sql = "SELECT * FROM list_table WHERE type=? AND title=?";
            $stmt = $conn->prepare($sql);
            if ($stmt) {
                $stmt->bind_param("ss", $category, $row['title']);
                $stmt->execute();
                $res = $stmt->get_result();
                // Rest of your code
            } else {
                echo "Error in preparing SQL statement: " . $conn->error;
            }
           if ($res->num_rows > 0) {
               while($row1 = $res->fetch_assoc()) {
                   $pg_name=$row1["title"];

                   $avgRatingSql = "SELECT AVG(overall_rating) as average_rating FROM pg_ratings WHERE pg_name='$pg_name'";

               $avgRatingResult = $conn->query($avgRatingSql);
               if ($avgRatingResult->num_rows > 0) {
                   $avgRatingRow = $avgRatingResult->fetch_assoc();
                   $averageRating = $avgRatingRow['average_rating'];
                   // Display the mess name and its average rating
                   echo "<div class='mess-info'>";

                   displayStars($averageRating);
                   echo "</div>";
           }
        }
       }
    }
    if(strcmp($category,"medical")==0)
    {
        
        $sql = "SELECT * FROM list_table WHERE type=? AND title=?";
        $stmt = $conn->prepare($sql);
        if ($stmt) {
            $stmt->bind_param("ss", $category, $row['title']);
            $stmt->execute();
            $res = $stmt->get_result();
            // Rest of your code
        } else {
            echo "Error in preparing SQL statement: " . $conn->error;
        }
       if ($res->num_rows > 0) {
           while($row1 = $res->fetch_assoc()) {
               $medical_name=$row1["title"];

               $avgRatingSql = "SELECT AVG(overall_rating) as average_rating FROM medical_ratings WHERE medical_name='$medical_name'";

           $avgRatingResult = $conn->query($avgRatingSql);
           if ($avgRatingResult->num_rows > 0) {
               $avgRatingRow = $avgRatingResult->fetch_assoc();
               $averageRating = $avgRatingRow['average_rating'];
               // Display the mess name and its average rating
               echo "<div class='mess-info'>";

               displayStars($averageRating);
               echo "</div>";
       }
    }
   }
}
            
                echo "<p>Price: ₹" . $row["price"] . "</p>";
                echo '<div class="loca"><span class="material-symbols-outlined">
                location_on
                </span> ' . $row["location"] . "</div>";
                echo '<span class="service">'.explode(',',$row["services"])[0].'</span><span class="service">'.explode(',',$row["services"])[1].'</span><span class="service">'.explode(',',$row["services"])[2].'</span>';
                echo '<span class="phone">'.$row['phone'].'</span>';
                echo "</div>";
                echo "</div>";
                echo '<div class="rate_us">';
                echo '<form id="ratingForm" action="submit_rating.php" method="post">';
                echo '<h2>Rate Service</h2>';
                echo '<div class="r_star-rating">
                        <span class="r_star" data-rating="1">&#9733;</span>
                        <span class="r_star" data-rating="2">&#9733;</span>
                        <span class="r_star" data-rating="3">&#9733;</span>
                        <span class="r_star" data-rating="4">&#9733;</span>
                        <span class="r_star" data-rating="5">&#9733;</span>
                      </div>';
                echo '<input type="hidden" name="rating">'; // Move this line inside the form tag
                echo '<input type="hidden" name="category" value='.$_GET['category'].'>';
                echo '<input type="hidden" name="s_name" value="' . str_replace('+', ' ', urlencode($row['title'])) . '">';
                echo '<button id="submitBtn" class="btn btn-primary mt-3">Submit</button>';
                echo '</form>';
                echo '</div>';
                
            }
        } else {
            echo "No items found.";
        }
        echo '</div>';
        $conn->close();



        
    function displayStars($rating) {
        $fullStars = (int)$rating;
        $halfStar = $rating - $fullStars > 0 ? 1 : 0;
        $emptyStars = 5 - $fullStars - $halfStar;
    
        echo '<div class="star-rating">';
        for ($i = 0; $i < $fullStars; $i++) {
            echo '<span class="star filled">&#9733;</span>'; // Full star
        }
        if ($halfStar) {
            echo '<span class="star half">&#9733;</span>'; // Half star
        }
        for ($i = 0; $i < $emptyStars; $i++) {
            echo '<span class="star">&#9733;</span>'; // Empty star
        }
        echo '</div>';
    }
?>