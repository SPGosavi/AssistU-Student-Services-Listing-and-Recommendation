<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$host = "localhost";
$username = "root";
$password = "";
$database = "id21975537_navigate_db";

$conn = new mysqli($host, $username, $password, $database);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['username'], $_POST['pass'])) {
    $name = $_POST['username'];
    $pass = $_POST['pass'];

    $query = "SELECT * FROM users WHERE name='$name' and pass='$pass'";
    $res = $conn->query($query);
    $num=mysqli_num_rows($res);

    if($num>=1)
    {
        echo "Login sucessfull";
        session_start();
        $_SESSION['loggedin']=true;
        $_SESSION['name']=$name;
        header("location: welcome.php");
    }
    else
    {
        echo "Login failed";
    }


    // if ($res->num_rows > 0) {
    //     $row = $res->fetch_assoc();
    //     if (password_verify($pass, $row['pass'])) {
    //         echo "Login Successful! Welcome " . $row['name'];
    //     } else {
    //         echo "Incorrect Password";
    //     }
    // } else {
    //     echo "User not found";
    // }
}
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assist You - Login</title>
    <link rel="stylesheet" href="login.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800;900&display=swap" rel="stylesheet">
</head>
<body>
    <div class="wrapper">
        <form action="" method="post">
            <h1>Login</h1>
             <div class="input-box">
                <input name="username" type="text" placeholder="Username" required>
                <i class='bx bxs-user'></i>
             </div>
             <div class="input-box">
                <input id="pass" name="pass" type="password" placeholder="Password" required>
                <i class='bx bxs-lock-alt' ></i>
                <img id="eyecb" src="eye-close.png" alt="" onclick="passvisibility()">
             </div>
             <div class="remember-forgot">
                <label><input type="checkbox">Remember me</label>
                <a href="#">Forgot password</a>
             </div>
             <button type="submit" class="btn">Login</button>
             <div class="register-link">
                <p>Don't have an account ? 
                    <a href="/registration/register.html">Register</a> </p>
                
             </div>
        </form>
    </div>

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