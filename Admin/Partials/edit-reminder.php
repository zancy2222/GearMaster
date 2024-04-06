<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'dbConn.php';

    // Retrieve form data
    $reminderId = $_POST["reminder_id"];
    $chats = $_POST["chats"];
    $reminderDatetime = $_POST["reminder_datetime"];

    // Prepare and execute SQL statement to update the reminder
    $query = "UPDATE Reminder SET chats = ?, reminder_datetime = ? WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $chats, $reminderDatetime, $reminderId);
    
    // Check if the query executed successfully
    if ($stmt->execute()) {
        
        echo '<script>';
        echo 'alert("Reminder updated successfully.");';
        echo 'window.location.href = "../Reminder.php";';
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the page if accessed directly without form submission
    header("Location: ../Appoint.php");
    exit();
}
?>
