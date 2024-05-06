<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="Assets/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <style>
      .home-section {
    padding: 50px 0;
    background-color: #f8f9fa;
}

.container {
    width: 80%;
    margin: 0 auto;
}

.table-container {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-spacing: 0;
}

table th,
table td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #dee2e6;
}

table th {
    background-color: #343a40;
    color: #ffffff;
}

table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

table tbody tr:hover {
    background-color: #e2e6ea;
}
.popup-form {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #f9f9f9;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    z-index: 9999;
}

.popup-content {
    text-align: center;
}

.close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #333;
}

.popup-content h2 {
    margin-bottom: 20px;
    color: #333;
}

.popup-content .form-group {
    margin-bottom: 20px;
}

.popup-content label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

.popup-content textarea,
.popup-content input[type="datetime-local"],
.popup-content input[type="submit"] {
    width: calc(100% - 20px);
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
    box-sizing: border-box;
}

.popup-content input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.popup-content input[type="submit"]:hover {
    background-color: #0056b3;
}

button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        button:hover {
            background-color: #0056b3;
        }
    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class=""></i>
        <div class="logo_name">Alfeo's Auto  Electrical Shop</div>
        <i class="bx bx-menu" id="btn"></i>
      </div>
      <ul class="nav-list">
        <li>
          <i class="bx bx-search"></i>
          <input type="text" placeholder="Search..." />
          <span class="tooltip">Search</span>
        </li>
        <li>
          <a href="index.php">
            <i class="bx bx-grid-alt"></i>
            <span class="links_name">Dashboard</span>
          </a>
          <span class="tooltip">Dashboard</span>
        </li>
        <li>
          <a href="Admin_Appoint.php">
            <i class="bx bx-chat"></i>
            <span class="links_name">Appointment</span>
          </a>
          <span class="tooltip">Appointment</span>
        </li>
        <li>
          <a href="User.php">
            <i class="bx bx-user"></i>
            <span class="links_name">User</span>
          </a>
          <span class="tooltip">User</span>
        </li>
        <li>
          <a href="AdminDetails.php">
          <i class='bx bxs-user-pin'></i>
          <span class="links_name">Admins</span>
          </a>
          <span class="tooltip">Admins</span>
        </li>
        <li>
          <a href="Graph.php">
            <i class="bx bx-pie-chart-alt-2"></i>
            <span class="links_name">Analytics</span>
          </a>
          <span class="tooltip">Analytics</span>
        </li>
        <li>
          <a href="Reminder.php">
            <i class="bx bx-folder"></i>
            <span class="links_name">Reminder</span>
          </a>
          <span class="tooltip">Reminder</span>
        </li>
        <li>
          <a href="UserReply.php">
          <i class='bx bxs-message-rounded-dots'></i>
          <span class="links_name">User Reply</span>
          </a>
          <span class="tooltip">User Reply</span>
        </li>
        
      
        <li class="profile">
          <div class="profile-details">
            <img src="LogoGM.png" alt="profileImg" />
            <div class="name_job">
              <div class="name">GEAR</div>
              <div class="job">Master</div>
            </div>
          </div>
        
          <i class="bx bx-log-out" id="log_out"></i>
        </li>
      </ul>
    </div>
    <section class="home-section">
    <div class="container">
        <h2>Reservations</h2>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Reservation ID</th>
                        <th>Customer Name</th>
                        <th>Gear Types</th>
                        <th>Messages</th>
                        <th>Reservation Time</th>
                        <th>Reservation Date</th>
                        <th>Actions</th> <!-- New header column for Actions -->

                    </tr>
                </thead>
                <tbody>
                <?php
// Include database connection
include 'Partials/dbConn.php';

// Retrieve reservations from the database
$query = "SELECT * FROM Reserve";
$result = mysqli_query($conn, $query);

// Check if there are any reservations
if (mysqli_num_rows($result) > 0) {
    // Loop through each reservation
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row['Reserve_ID'] . "</td>";
        echo "<td>" . $row['CustomerName'] . "</td>";
        echo "<td>" . $row['GearTypes'] . "</td>";
        echo "<td>" . $row['Messages'] . "</td>";
        echo "<td>" . $row['ReserveTime'] . "</td>";
        echo "<td>" . $row['ReserveDate'] . "</td>";
        echo "<td><button onclick='openReminderForm(" . $row['Reserve_ID'] . ")'>Notify</button></td>";
        echo "</tr>";
    }
} else {
    // Display a message if there are no reservations
    echo "<tr><td colspan='7'>No reservations found</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>

                </tbody>
            </table>
        </div>
    </div>
</section>

<div class="popup-form" id="reminderForm">
    <span class="close" onclick="closeReminderForm()">&times;</span>
    <div class="popup-content">
        <h2>Create Reminder</h2>
        <form id="reminderFormContent" action="Partials/save-reminder.php" method="post">
            <div class="form-group">
                <label for="reminder_chats">Chats:</label>
                <textarea name="reminder_chats" id="reminder_chats" placeholder="Enter your message" required></textarea>
            </div>
            <div class="form-group">
                <label for="reminder_datetime">Reminder DateTime:</label>
                <input type="datetime-local" name="reminder_datetime" id="reminder_datetime" required>
            </div>
            <input type="hidden" name="reservation_id" id="reservationId">
            <input type="submit" value="Save Reminder">
        </form>
    </div>
</div>


    <script src="Assets/script.js"></script>
    <script>
function openReminderForm(reserveId) {
    document.getElementById('reminderForm').style.display = 'block';
    document.getElementById('reserveId').value = reserveId;
}

function closeReminderForm() {
    document.getElementById('reminderForm').style.display = 'none';
}

    </script>

<script>
  // Get the element by its ID
  const logOutIcon = document.getElementById('log_out');

  // Add click event listener
  logOutIcon.addEventListener('click', function() {
    // Redirect to the specified URL
    window.location.href = '../Login.php';
  });
</script>

  </body>
</html>
