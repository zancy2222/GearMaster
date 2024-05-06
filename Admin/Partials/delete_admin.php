<?php
// Include database connection
include 'dbConn.php';

// Check if userId parameter is provided and form is submitted
if (isset($_POST['userId'])) {
    $userId = $_POST['userId'];

    // Prepare and execute query to delete user data
    $query = "DELETE FROM Users WHERE User_Id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // User data deleted successfully
        echo '<script>';
        echo 'alert("Admin Delete successfully.");';
        echo 'window.location.href = "AdminDetails.php";';
        echo '</script>';    } else {
        // Error deleting user data
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle case where userId parameter is missing
    echo "User ID parameter is missing";
}
?>
