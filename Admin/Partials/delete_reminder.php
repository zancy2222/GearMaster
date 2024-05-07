<?php
// Include database connection
include 'dbConn.php';

// Check if the request method is POST and if the 'id' parameter is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    // Sanitize the input to prevent SQL injection
    $reminderId = mysqli_real_escape_string($conn, $_POST['id']);

    // Prepare a SQL statement to delete the reminder with the given ID
    $deleteQuery = "DELETE FROM reminder WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);
    $stmt->bind_param("i", $reminderId);

    // Execute the delete query
    if ($stmt->execute()) {
        // Success message (optional)
        echo "Reminder deleted successfully.";
    } else {
        // Error message
        echo "Error deleting reminder: " . $conn->error;
    }

    // Close the prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // If the request method is not POST or if 'id' parameter is not set, return an error message
    echo "Invalid request.";
}
?>
