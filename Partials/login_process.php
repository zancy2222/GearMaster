<?php
session_start();
include 'dbConn.php'; // Include database connection

// Check if the form has been submitted
if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if the user exists
    $sql = "SELECT * FROM Users WHERE Email='$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verify password
        if (password_verify($password, $user['Password'])) {
            // Set session variables
            $_SESSION['user_id'] = $user['User_Id'];
            // Check if the user is admin
            if ($user['Email'] === 'admin' && $password === 'admin') {
                header("Location: admin.php");
                exit();
            } else {
                header("Location: main.php?user_id=".$user['User_Id']);
                exit();
            }
        } else {
            echo '<script>';
            echo 'alert("Incorrect Password.");';
            echo 'setTimeout(function() { window.location.href = "../Login.php"; }, 1000);'; // Delay redirection by 1 second
            echo '</script>';
        }
    } else {
        echo '<script>';
        echo 'alert("Please Register first.");';
        echo 'setTimeout(function() { window.location.href = "../Login.php"; }, 1000);'; // Delay redirection by 1 second
        echo '</script>';
    }
}

$conn->close();
?>
