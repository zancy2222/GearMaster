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


    .add-button {
        margin-bottom: 20px;
        text-align: right;
    }

    .add-button button {
        background-color: green;
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 5px;
        cursor: pointer;
    }

    .add-button button:hover {
        background-color: darkgreen;
    }
    .table-container button {
            border: none;
            background: none;
            cursor: pointer;
            margin: 0 5px; /* Add margin for spacing */
        }

        .table-container button:hover {
            transform: scale(1.1);
        }

        .edit-button {
            color: blue;
            font-size: 24px;
        }

        .delete-button {
            color: red;
            font-size: 24px;

        }
          /* Styling for pop-up form */        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            justify-content: center;
            align-items: center;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
        }

        .form-container input[type="text"],
        .form-container input[type="email"],
        .form-container input[type="password"],
        .form-container select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container input[type="submit"] {
            background-color: #4caf50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .form-container button {
            background-color: #f44336;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .form-container button:hover {
            background-color: #da190b;
        }
    </style>
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
        <li>
          <a href="Admin_History.php">
          <i class='bx bx-history'></i>
          <span class="links_name">History</span>
          </a>
          <span class="tooltip">History</span>
        </li>

       
        <li>
          <a href="Admin_Summary.php">
          <i class='bx bx-task'></i>
          <span class="links_name">Summary</span>
          </a>
          <span class="tooltip">Summary</span>
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
        <h2>Users Reply</h2>
       
        <div class="table-container">
        <table>
    <thead>
        <tr>
            <th>Reminder</th>
            <th>Reply Message</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    // Include database connection
    include 'Partials/dbConn.php';

    // Retrieve data from the reminder and ReplyReminders tables
    $query = "SELECT r.id AS reminder_id, r.chats AS reminder, rr.reply_message AS reply_message
              FROM reminder r
              LEFT JOIN ReplyReminders rr ON r.id = rr.reminder_id";
    $result = mysqli_query($conn, $query);

    // Check if there are any records
    if (mysqli_num_rows($result) > 0) {
        // Display data in the table
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['reminder'] . "</td>";
            echo "<td>" . $row['reply_message'] . "</td>";
            echo "<td><button onclick='deleteReminder(" . $row['reminder_id'] . ")'>Delete</button></td>";
            echo "</tr>";
        }
    } else {
        // Display a message if there are no records
        echo "<tr><td colspan='3'>No records found</td></tr>";
    }

    // Close the database connection
    mysqli_close($conn);
    ?>
    </tbody>
</table>

    </div>

   


    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="Assets/script.js"></script>
    <script>
function deleteReminder(reminderId) {
    if (confirm("Are you sure you want to delete this reminder?")) {
        // Send an AJAX request to delete_reminder.php with the reminder ID
        $.ajax({
            type: "POST",
            url: "Partials/reply_delete.php",
            data: { reminder_id: reminderId },
            success: function(response) {
                // Refresh the page or update the table after successful deletion
                location.reload();
            },
            error: function(xhr, status, error) {
                // Handle errors
                console.error(xhr.responseText);
            }
        });
    }
}
</script>

  </body>
</html>
