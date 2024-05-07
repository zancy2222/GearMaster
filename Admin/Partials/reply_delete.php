<?php
// Include database connection
include 'dbConn.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the reminder ID is set in the POST data
    if (isset($_POST['reminder_id'])) {
        // Sanitize the reminder ID to prevent SQL injection
        $reminderId = mysqli_real_escape_string($conn, $_POST['reminder_id']);

        // Delete the reminder from the database
        $deleteQuery = "DELETE FROM reminder WHERE id = '$reminderId'";
        if (mysqli_query($conn, $deleteQuery)) {
            // Check if any rows were affected
            if (mysqli_affected_rows($conn) > 0) {
                // Reminder deleted successfully
                echo "Reminder deleted successfully";
            } else {
                // No rows affected, reminder not found
                echo "Reminder not found";
            }
        } else {
            // Error deleting reminder
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        // Reminder ID not set in POST data
        echo "Reminder ID not provided";
    }
} else {
    // Request method is not POST
    echo "Invalid request method";
}

// Close the database connection
mysqli_close($conn);
?>
