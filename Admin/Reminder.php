<!DOCTYPE html>
<!-- Website - www.codingnepalweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8" />
    <title>Dashboard</title>
    <link rel="stylesheet" href="Assets/style.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
    background-color: #ffffff;
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
}

.popup-content label {
    display: block;
    margin-bottom: 10px;
}

.popup-content textarea,
.popup-content input[type="datetime-local"],
.popup-content input[type="submit"] {
    width: 100%;
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
  </head>
  <body>
    <div class="sidebar">
      <div class="logo-details">
        <i class=""></i>
        <div class="logo_name">GEAR MASTER</div>
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
        <h2>Users info</h2>
        <div class="table-container">
        <table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Chats</th>
            <th>Reminder DateTime</th>
            <th>Actions</th> <!-- New column for Edit button -->
        </tr>
    </thead>
    <tbody>
        <?php
        // Include database connection
        include 'Partials/dbConn.php';

        // Retrieve reminders from the database
        $query = "SELECT * FROM Reminder";
        $result = mysqli_query($conn, $query);

        // Check if there are any reminders
        if (mysqli_num_rows($result) > 0) {
            // Loop through each reminder
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['chats'] . "</td>";
                echo "<td>" . $row['reminder_datetime'] . "</td>";
                echo "<td><button onclick='openEditForm(" . $row['id'] . ", \"" . $row['chats'] . "\", \"" . $row['reminder_datetime'] . "\")'>Edit</button></td>";
                echo "</tr>";
            }
        } else {
            // Display a message if there are no reminders
            echo "<tr><td colspan='4'>No reminders found</td></tr>";
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
    </tbody>
</table>
        </div>
    </div>
    </section>

    
<div id="reminderForm" class="popup-form">
    <div class="popup-content">
        <span class="close" onclick="closeReminderForm()">&times;</span>
        <h2>Edit Reminder</h2>
        <form id="reminderFormContent" action="Partials/edit-reminder.php" method="post">
            <label for="chats">Chat:</label>
            <textarea name="chats" id="chatsInput" placeholder="Enter your chat message" required></textarea>

            <label for="reminder_datetime">Date and Time:</label>
            <input type="datetime-local" name="reminder_datetime" id="datetimeInput" required>

            <input type="hidden" name="reminder_id" id="reminderId">

            <input type="submit" value="Edit Reminder">
        </form>
    </div>
</div>

    <script src="Assets/script.js"></script>
    <script>
    function openEditForm(id, chats, datetime) {
        document.getElementById('reminderId').value = id;
        document.getElementById('chatsInput').value = chats;
        document.getElementById('datetimeInput').value = datetime;
        document.getElementById('reminderForm').style.display = 'block';
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
