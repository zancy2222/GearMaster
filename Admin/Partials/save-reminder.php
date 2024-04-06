<?php
session_start();
include 'dbConn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $chats = $_POST["reminder_chats"];
    $reminderDatetime = $_POST["reminder_datetime"];
    $reservationId = $_POST["reservation_id"];

    $query = "INSERT INTO Reminder (chats, reminder_datetime) VALUES (?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $chats, $reminderDatetime);

    if ($stmt->execute()) {
        echo '<script>';
        echo 'alert("Reminder saved successfully.");';
        echo 'window.location.href = "../Admin_Appoint.php";';
        echo '</script>';
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: ../Admin_Appoint.php");
    exit();
}
?>
