<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['rating'])) {
    $rating = $_POST['rating'];
    $category = $_POST['category']; // Get the category from the form
    $s_name=$_POST['s_name'];

    echo $s_name;
    // Assuming you have already established a database connection
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "id21975537_navigate_db";

    $conn = new mysqli($host, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare the SQL statement based on the category
    switch ($category) {
        case "mess":
            $sql = "INSERT INTO mess_ratings (overall_rating,mess_name) VALUES ('$rating','$s_name')";
            break;
        case "laundry":
            $sql = "INSERT INTO laundry_ratings (overall,laundry_name) VALUES ('$rating','$s_name')";
            break;
        case "pg":
            $sql = "INSERT INTO pg_ratings (overall_rating,pg_name) VALUES ('$rating','$s_name')";
            break;
        case "medical":
            $sql = "INSERT INTO medical_ratings (overall_rating,medical_name) VALUES ('$rating','$s_name')";
            break;
        default:
            echo "Invalid category.";
            exit; // Exit script if category is invalid
    }

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        echo "Rating submitted successfully.";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>
