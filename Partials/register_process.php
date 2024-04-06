<?php
include 'dbConn.php'; // Include database connection

// Check if the form has been submitted
if(isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if passwords match
    if ($password !== $confirm_password) {
        echo "Passwords do not match";
        exit();
    }

    // Check if email already exists in the database
    $sql = "SELECT * FROM Users WHERE Email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        echo "Email already exists";
        exit();
    }

    // If email doesn't exist, proceed with registration
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO Users (Name, Email, Password) VALUES ('$name', '$email', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        echo '<script>';
        echo 'alert("Successfully Registered.");';
        echo 'window.location.href = "../Login.php";';
        echo '</script>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
