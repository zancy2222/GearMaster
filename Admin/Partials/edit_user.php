<?php
// Include database connection
include 'dbConn.php';

// Check if editUserId is provided and form is submitted
if (isset($_POST['editUserId']) && isset($_POST['editName']) && isset($_POST['editEmail']) && isset($_POST['editPassword']) && isset($_POST['editRole']) && isset($_POST['editContactNumber']) && isset($_POST['editUsnNo'])) {
    $editUserId = $_POST['editUserId'];
    $editName = $_POST['editName'];
    $editEmail = $_POST['editEmail'];
    $editPassword = $_POST['editPassword'];
    $editRole = $_POST['editRole'];
    $editContactNumber = $_POST['editContactNumber'];
    $editUsnNo = $_POST['editUsnNo'];

    // Hash the password before storing
    $hashed_password = password_hash($editPassword, PASSWORD_DEFAULT);

    // Prepare and execute query to update user data
    $query = "UPDATE Users SET Name='$editName', email='$editEmail', password='$hashed_password', role='$editRole', ContactNumber='$editContactNumber', USN_NO='$editUsnNo' WHERE User_Id = $editUserId";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo '<script>';
        echo 'alert("User Updated successfully.");';
        echo 'window.location.href = "../User.php";';
        echo '</script>';
    } else {
        // Error updating user data
        echo "Error: " . mysqli_error($conn);
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // Handle case where form data is incomplete
    echo "Incomplete form data";
}
?>
