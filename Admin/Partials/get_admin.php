<?php
// Include database connection
include 'dbConn.php';

// Check if userId parameter is provided
if (isset($_GET['userId'])) {
    $userId = $_GET['userId'];

    // Prepare and execute query to fetch user data
    $query = "SELECT * FROM Users WHERE User_Id = $userId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Check if user exists
        if (mysqli_num_rows($result) == 1) {
            // Fetch user data
            $userData = mysqli_fetch_assoc($result);

            // Convert user data to JSON format
            echo json_encode($userData);
        } else {
            // User not found
            echo json_encode(array('error' => 'User not found'));
        }
    } else {
        // Query execution failed
        echo json_encode(array('error' => 'Query execution failed'));
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // userId parameter is missing
    echo json_encode(array('error' => 'User ID parameter is missing'));
}
?>
