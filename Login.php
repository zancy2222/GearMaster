<?php
session_start();
include 'Partials/dbConn.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["register"])) {
        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        // Check if the email already exists
        $query = "SELECT * FROM Users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) > 0) {
            echo '<script>';
            echo 'alert("Email Already exists.");';
            echo 'window.location.href = "Login.php";';
            echo '</script>';
        } else {
            // Insert user details into the Users table
            $query = "INSERT INTO Users (Name, email, password) VALUES ('$name', '$email', '$password')";
            if (mysqli_query($conn, $query)) {
                echo '<script>';
                echo 'alert("Successfully Registered.");';
                echo 'window.location.href = "Login.php";';
                echo '</script>';
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        }
    } elseif (isset($_POST["login"])) {
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        // Check if the email exists
        $query = "SELECT * FROM Users WHERE email='$email'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 0) {
            echo '<script>';
            echo 'alert("Please Register first.");';
            echo 'setTimeout(function() { window.location.href = "Login.php"; }, 1000);'; // Delay redirection by 1 second
            echo '</script>';
        } else {
            $user = mysqli_fetch_assoc($result);
            // Verify password
            if ($password == $user["password"]) {
                // Redirect based on user type
                if ($user['role'] == 'admin') {
                    header("Location: Admin/index.php");
                } else {
                    header("Location: Customers/Appoint.php?user_id=" . $user["User_Id"]);
                }
            } else {
                echo '<script>';
                echo 'alert("Incorrect Password.");';
                echo 'setTimeout(function() { window.location.href = "Login.php"; }, 1000);'; // Delay redirection by 1 second
                echo '</script>';
            }
        }
    }
}
?>



<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- ===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <!-- ===== CSS ===== -->
    <link rel="stylesheet" href="Assets/style.css">
         
    <title>Login & Registration Form</title> 
</head>
<body>
    
    <div class="container">
        <div class="forms">
 <!-- Login Form -->
<div class="form login">
    <span class="title">Login</span>
    <form action="Login.php" method="POST"> <!-- Specify method as POST -->
        <div class="input-field">
            <input type="text" name="email" placeholder="Enter your email" required> <!-- Add name attribute -->
            <i class="uil uil-envelope icon"></i>
        </div>
        <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Enter your password" required> <!-- Add name attribute -->
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
        </div>
        <div class="input-field button">
            <input type="submit" name="login" value="Login">
        </div>
    </form>
    <div class="login-signup">
        <span class="text">Not a member?
            <a href="#" class="text signup-link">Signup Now</a>
        </span>
    </div>
</div>

<!-- Registration Form -->
<div class="form signup">
    <span class="title">Registration</span>
    <form action="Login.php" method="POST"> <!-- Specify method as POST -->
        <div class="input-field">
            <input type="text" name="name" placeholder="Enter your name" required> <!-- Add name attribute -->
            <i class="uil uil-user"></i>
        </div>
        <div class="input-field">
            <input type="text" name="email" placeholder="Enter your email" required> <!-- Add name attribute -->
            <i class="uil uil-envelope icon"></i>
        </div>
        <div class="input-field">
            <input type="password" name="password" class="password" placeholder="Create a password" required> <!-- Add name attribute -->
            <i class="uil uil-lock icon"></i>
        </div>
        <div class="input-field">
            <input type="password" name="confirm_password" class="password" placeholder="Confirm a password" required> <!-- Add name attribute -->
            <i class="uil uil-lock icon"></i>
            <i class="uil uil-eye-slash showHidePw"></i>
        </div>
        <div class="checkbox-text">
            <div class="checkbox-content">
                <input type="checkbox" id="termCon" required>
                <label for="termCon" class="text">I accepted all terms and conditions</label>
            </div>
        </div>
        <div class="input-field button">
            <input type="submit" name="register" value="Signup">
        </div>
    </form>
    <div class="login-signup">
        <span class="text">Already a member?
            <a href="#" class="text login-link">Login Now</a>
        </span>
    </div>
</div>

        </div>
    </div>

     <script src="Assets/script.js"></script> 
</body>
</html>