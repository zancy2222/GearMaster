<?php
// Include database connection
include 'dbConn.php';

if (isset($_POST['reserveID'])) {
    $reserveID = $_POST['reserveID'];

    // Begin a transaction
    mysqli_begin_transaction($conn);

    try {
        // Retrieve the reservation details
        $query = "SELECT * FROM Reserve WHERE Reserve_ID = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, 'i', $reserveID);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $reservation = mysqli_fetch_assoc($result);

        if ($reservation) {
            // Insert the reservation into the AppointmentDone table
            $query = "INSERT INTO AppointmentDone (Reserve_ID, CustomerName, GearTypes, Messages, ReserveTime, ReserveDate) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'isssss', $reservation['Reserve_ID'], $reservation['CustomerName'], $reservation['GearTypes'], $reservation['Messages'], $reservation['ReserveTime'], $reservation['ReserveDate']);
            mysqli_stmt_execute($stmt);

            // Delete the reservation from the Reserve table
            $query = "DELETE FROM Reserve WHERE Reserve_ID = ?";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, 'i', $reserveID);
            mysqli_stmt_execute($stmt);

            // Commit the transaction
            mysqli_commit($conn);
            echo "Success";
        } else {
            throw new Exception("Reservation not found");
        }
    } catch (Exception $e) {
        // Rollback the transaction in case of error
        mysqli_rollback($conn);
        echo "Error: " . $e->getMessage();
    }

    // Close the statement and connection
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
} else {
    echo "Error: No reservation ID provided";
}
?>
