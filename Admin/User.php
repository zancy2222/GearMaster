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
        <h2>Users info</h2>
       <!-- Add button "Add" above the table -->
<div class="add-button">
<button id="addButton" onclick="openForm()">Add</button>
</div>
<div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>User ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php
// Include database connection
include 'Partials/dbConn.php';

// Retrieve users with the role "user" from the database
$queryUsers = "SELECT * FROM Users WHERE role = 'user'";
$resultUsers = mysqli_query($conn, $queryUsers);

// Check if there are any users with the role "user"
if (mysqli_num_rows($resultUsers) > 0) {
    // Display users with the role "user" in the table
    while ($row = mysqli_fetch_assoc($resultUsers)) {
        echo "<tr>";
        echo "<td>" . $row['User_Id'] . "</td>";
        echo "<td>" . $row['Name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "<td>" . $row['role'] . "</td>";
        echo "<td>";
        echo "<button class='edit-button' onclick='openEditForm(" . $row['User_Id'] . ")'><i class='bx bx-edit-alt'></i></button>"; // Pass User_Id to JavaScript function
        echo "<button class='delete-button' onclick='deleteUser(" . $row['User_Id'] . ")'><i class='bx bx-trash'></i></button>"; // Delete button with onclick event
        echo "</td>";
        echo "</tr>";
    }
} else {
    // Display a message if there are no users with the role "user"
    echo "<tr><td colspan='5'>No users found with the role 'user'</td></tr>";
}

// Close the database connection
mysqli_close($conn);
?>

            </tbody>
        </table>
    </div>

    <div class="overlay" id="overlay">
        <div class="form-container">
            <h2>Add User</h2>
            <form action="Partials/add_user.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
                <label for="role">Role:</label>
                <select name="role" id="role" required>
                    <option value="user">User</option>
                </select>
                <br><br>
                <input type="submit" value="Submit">
                <button type="button" onclick="closeForm()">Close</button>
            </form>
        </div>
    </div>

<!-- Edit User Pop-up form -->
<div class="overlay" id="editOverlay">
    <div class="form-container">
        <h2>Edit User</h2>
        <form id="editUserForm" method="POST" action="Partials/edit_user.php"> <!-- Add action attribute -->
            <input type="hidden" id="editUserId" name="editUserId">
            <label for="editName">Name:</label>
            <input type="text" id="editName" name="editName" required>
            <label for="editEmail">Email:</label>
            <input type="email" id="editEmail" name="editEmail" required>
            <label for="editPassword">Password:</label>
            <input type="password" id="editPassword" name="editPassword" required>
            <label for="editRole">Role:</label>
            <select name="editRole" id="editRole" required>
                <option value="user">User</option>
            </select>
            <br><br>
            <input type="submit" value="Submit">
            <button type="button" onclick="closeEditForm()">Close</button>
        </form>
    </div>
</div>

<div class="overlay" id="deleteOverlay">
    <div class="form-container">
        <h2>Delete User</h2>
        <p>Are you sure you want to delete this user?</p>
        <form id="deleteUserForm" method="POST" action="Partials/delete_user.php">
            <input type="hidden" id="deleteUserId" name="deleteUserId">
            <input type="submit" value="Delete">
            <button type="button" onclick="closeDeleteForm()">Cancel</button>
        </form>
    </div>
</div>


    </div>
</section>

    <script src="Assets/script.js"></script>
    <script>
        // Function to open the pop-up form
        function openForm() {
            document.getElementById("overlay").style.display = "flex";
        }

        // Function to close the pop-up form
        function closeForm() {
            document.getElementById("overlay").style.display = "none";
        }


    </script>
    
    <script>
        // Function to open the add user form
        function openForm() {
            document.getElementById("overlay").style.display = "flex";
        }

        // Function to close the add user form
        function closeForm() {
            document.getElementById("overlay").style.display = "none";
        }

        // Function to open the edit user form
        function openEditForm(userId) {
            // Fetch user data using AJAX and populate the edit form fields
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    let userData = JSON.parse(this.responseText);
                    document.getElementById("editUserId").value = userData.User_Id;
                    document.getElementById("editName").value = userData.Name;
                    document.getElementById("editEmail").value = userData.email;
                    document.getElementById("editRole").value = userData.role;
                    document.getElementById("editOverlay").style.display = "flex";
                }
            };
            xhttp.open("GET", "Partials/get_user.php?userId=" + userId, true);
            xhttp.send();
        }

        // Function to close the edit user form
        function closeEditForm() {
            document.getElementById("editOverlay").style.display = "none";
        }
    </script>

<script>
    // Function to delete user via AJAX
    function deleteUser(userId) {
        if (confirm("Are you sure you want to delete this user?")) {
            // Send AJAX request to delete_user.php
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Reload the page to reflect changes after deletion
                    location.reload();
                }
            };
            xhttp.open("POST", "Partials/delete_user.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("userId=" + userId);
        }
    }
</script>
  </body>
</html>
