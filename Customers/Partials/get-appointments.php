<?php
session_start();

// Include database connection
include 'dbConn.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $customerName = $_POST["customer_name"];
    $gearTypes = $_POST["gear_types"];
    $messages = $_POST["messages"];
    $reserveTime = $_POST["reserve_time"];
    $reserveDate = $_POST["schedule"]; // Using the scheduled date from the calendar

    // Check if the appointment limit for the date is reached
    $checkLimitQuery = "SELECT count FROM appointment_counts WHERE date = ?";
    $stmt = $conn->prepare($checkLimitQuery);
    $stmt->bind_param("s", $reserveDate);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $appointmentCount = $row['count'];
        if ($appointmentCount >= 10) {
            // Appointment limit reached
            echo "<script>alert('Appointment limit reached for this date. Only 10');</script>";
            echo "<script>window.location.href = '../Appoint.php';</script>"; // Redirect back to the appointment page
            exit();
        }
    }

    // Insert appointment into the reserve table
    $insertQuery = "INSERT INTO reserve (CustomerName, GearTypes, Messages, ReserveTime, ReserveDate) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($insertQuery);
    $stmt->bind_param("sssss", $customerName, $gearTypes, $messages, $reserveTime, $reserveDate);
    
    if ($stmt->execute()) {
        // Successfully inserted appointment, now increment appointment count for the date
        $updateCountQuery = "INSERT INTO appointment_counts (date, count) VALUES (?, 1) ON DUPLICATE KEY UPDATE count = count + 1";
        $stmtUpdateCount = $conn->prepare($updateCountQuery);
        $stmtUpdateCount->bind_param("s", $reserveDate);
        $stmtUpdateCount->execute();
        echo "<script>alert('Appointment Successfully Booked!');</script>";
        echo "<script>window.location.href = '../Appoint.php';</script>"; // Redirect back to the appointment page
        exit();
    } else {
        // Error in inserting appointment
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
} else {
    // Redirect back to the appointment page if accessed directly without form submission
    header("Location: ../Appoint.php");
    exit();
}
?>