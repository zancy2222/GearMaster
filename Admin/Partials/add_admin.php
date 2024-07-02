<?php
// Include database connection
include 'dbConn.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Prepare and execute query to insert new user data into the database
    $query = "INSERT INTO Users (Name, email, password, role) VALUES ('$name', '$email', '$hashed_password', '$role')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // User data inserted successfully
        echo '<script>alert("User added successfully."); window.location.href = "../AdminDetails.php";</script>'; // Redirect to index.php or any other page
    } else {
        // Error inserting user data
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
