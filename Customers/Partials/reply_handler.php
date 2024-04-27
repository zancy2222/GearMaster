<?php
// Include database connection
include 'dbConn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the reply message and reminder ID from the form
    $reply_message = $_POST['reply_message'];
    $reminder_id = $_POST['reminder_id'];

    // Prepare and execute the SQL query to insert the reply into the ReplyReminders table
    $sql = "INSERT INTO ReplyReminders (reminder_id, reply_message) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    if ($stmt) {
        // Bind parameters and execute the statement
        mysqli_stmt_bind_param($stmt, "is", $reminder_id, $reply_message);
        if (mysqli_stmt_execute($stmt)) {
            // Reply inserted successfully
            echo "<script>alert('Reply sent successfully!');</script>";
            echo "<script>window.location.href = '../Reminders.php';</script>"; // Redirect back to login page
            exit();
        } else {
            // Error occurred while inserting the reply
            echo "Error: " . mysqli_error($conn);
        }
        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        // Error occurred while preparing the statement
        echo "Error: " . mysqli_error($conn);
    }
}

// Close the database connection
mysqli_close($conn);
?>
