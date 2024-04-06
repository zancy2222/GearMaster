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
                <th>User ID</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
                </thead>
                <tbody>
                <?php
            // Include database connection
            include 'Partials/dbConn.php';

            // Retrieve users from the database
            $queryUsers = "SELECT * FROM Users";
            $resultUsers = mysqli_query($conn, $queryUsers);

            // Check if there are any users
            if (mysqli_num_rows($resultUsers) > 0) {
                // Loop through each user
                while ($row = mysqli_fetch_assoc($resultUsers)) {
                    echo "<tr>";
                    echo "<td>" . $row['User_Id'] . "</td>";
                    echo "<td>" . $row['Name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "</tr>";
                }
            } else {
                // Display a message if there are no users
                echo "<tr><td colspan='3'>No users found</td></tr>";
            }

            // Close the database connection
            mysqli_close($conn);
            ?>

                </tbody>
            </table>
        </div>
    </div>
</section>

    <script src="Assets/script.js"></script>
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
