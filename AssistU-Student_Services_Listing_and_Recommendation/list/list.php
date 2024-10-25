<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assist You - Add List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="row">
       
 <div class="col-6 offset-4">
   <br>
 <h3>Add New Listing</h3>
<form action="list.php" method="post">
            
<div class="mb-3">
    <label for="category" class="form-label">Select business</label>
    <select name="category" id="category" class="form*control">
        <option value="laundry">Laundry</option>
        <option value="mess">Mess</option>
        <option value="pg">PG</option>
        <option value="medical">Medical</option>
    </select>
</div class="mb-3" >
   <div>
    <label for="title" class="form-label">Title</label>
    <input name="title" type="text" placeholder="Enter Title" class="form-control">
 </div>
           
 <div class="mb-3">
    <label for="price" class="form-label" >Price</label>
    <input name="price" type="text" placeholder="Enter Price" class="form-control">

 </div>
                
 <div class="mb-3">
    <label for="location" class="form-label" >Location</label>
    <input name="location" type="text" placeholder="Enter Location" class="form-control">
 </div>

 <div class="mb-3">
    <label for="img" class="form-label" >Image Link</label>
    <input name="img" placeholder="Enter Image URL" class="form-control">
 </div>

 <div class="mb-3">
    <label for="services" class="form-label" >Enter Services</label>
    <input name="services" placeholder="Enter three services seprated by comma" class="form-control">
 </div>
 <div class="mb-3">
    <label for="phone" class="form-label" >Phone Number</label>
    <input name="phone" placeholder="Enter Contact Number" class="form-control">
 </div>
               
              
            
 <button class="btn  add-btn"type="submit">Add</button>
             </form>
            </div>
           

            
        </div>
       
         
     <style>
        .add-btn{
            background-color: #5AAE34;
        }    

     </style>   
        
     

    <script>
         function passvisibility() {
            var pass = document.getElementById("pass");
            if (pass.type === "password") {
                pass.type = "text";
            let eyecb=document.getElementById("eyecb");
               eyecb.src="eye-open.png";
            } else {
                pass.type = "password";
            let eyecb=document.getElementById("eyecb");
            eyecb.src="eye-close.png";
            }
        }
    </script>
</body>
</html>





<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "id21975537_navigate_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['category']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['location']) && isset($_POST['img'])) {
    $type = $_POST['category'];
    $title = $_POST['title'];
    $price = $_POST['price'];
    $services=$_POST['services'];
    $phone=$_POST['phone'];
    $location = $_POST['location'];
    $img = $_POST['img'];

    // Perform database insertion
    $sql = "INSERT INTO list_table (type, title, price, location, img, services, phone) VALUES ('$type', '$title', '$price', '$location', '$img', '$services','$phone')";
    if ($conn->query($sql) === TRUE) {
    } else {
    }
}
$conn->close();
?>
