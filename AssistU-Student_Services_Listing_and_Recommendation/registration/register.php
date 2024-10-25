<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "id21975537_navigate_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_POST['username'], $_POST['email'], $_POST['pass'])) {
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "INSERT INTO users (name, email, pass) VALUES ('$username', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assist You - Registration</title>
    <link rel="stylesheet" href="register.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Register</h1>
             <div class="input-box">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
             </div>
             <div class="input-box">
                <input name="email" type="text" placeholder="Email" required>
                <i style="font-size:18px" class="fa">&#xf0e0;</i>
             </div>
             <div class="input-box">
                <input id="pass" name="pass" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
                <img id="eyecb" src="eye-close.png" alt="" onclick="passvisibility()">
             </div>
             <div class="input-box">
                <input id="pass1" name="pass1" type="password" placeholder="Confirm Password" required>
                <i class='bx bxs-lock-alt' ></i>
             </div>
             <div class="showp">
               
             </div>
             <div class="remember-forgot">
             </div>
             <button onclick="return checkPass()" type="submit"  class="btn">Submit</button>
             <div class="register-link">
                <p>Already have an account ? 
                    <a href="/login/Login.html">Login</a> </p>
             </div>
        </form>
        <script src="register.js">
         function checkPass() {
             var password = document.getElementById("pass").value;
             var c_password = document.getElementById("pass1").value;
 
             if (password != c_password) {
                 alert("Passwords do not match!");
                 return false;
             }
             return true;
         }

         function passvisibility() {
            var pass = document.getElementById("pass");
            var pass1 = document.getElementById("pass1");
            if (pass.type === "password") {
                pass.type = "text";
                pass1.type = "text";
            let eyecb=document.getElementById("eyecb");
               eyecb.src="eye-open.png";
            } else {
                pass.type = "password";
                pass1.type = "password";
            let eyecb=document.getElementById("eyecb");
            eyecb.src="eye-close.png";
            }
        }
     </script>
    </div>
</body>
</html>