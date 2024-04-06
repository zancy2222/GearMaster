<?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'dbConn.php';

    // Retrieve form data
    $customerName = $_POST["customer_name"];
    $gearTypes = $_POST["gear_types"];
    $messages = $_POST["messages"];
    $reserveTime = $_POST["reserve_time"];
    $reserveDate = $_POST["schedule"]; // Using the scheduled date from the calendar

    // Prepare and execute SQL statement to insert data into the Reserve table
    $query = "INSERT INTO Reserve (CustomerName, GearTypes, Messages, ReserveTime, ReserveDate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssss", $customerName, $gearTypes, $messages, $reserveTime, $reserveDate);
    
    // Check if the query executed successfully
    if ($stmt->execute()) {
           // Redirect back to the appointment page if accessed directly without form submission
    header("Location: ../Appoint.php");
    exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Redirect back to the appointment page if accessed directly without form submission
    header("Location: ../Appoint.php");
    exit();
}
?>
