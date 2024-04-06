<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Gear Master</title>
      <link rel="stylesheet" href="Assets/style.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
      <style>
.home_sections {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f8f8f8;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.section_title {
    text-align: center;
    margin-bottom: 30px;
    font-family: 'Roboto', sans-serif;
    font-size: 24px;
    color: #333;
}

.reminder {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
}

.reminder:hover {
    transform: translateY(-5px);
}

.reminder h3 {
    margin-top: 0;
    margin-bottom: 10px;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    color: #333;
}

.reminder p {
    color: #666;
    font-size: 16px;
    line-height: 1.5;
}

.reminder_datetime {
    font-style: italic;
    color: #999;
    font-size: 14px;
}

    </style>

    </head>
    <body>
      <header>
        <div class="container">
          <div class="nav_bar">
            <div class="logo">
              <i class="fas fa-gear"></i>
              <h4>Gear Master</h4>
            </div>
            
    
              <div class="menu_list">
                <a href="Main.php">Home</a>
                <a href="Appoint.php">Book an Appointment</a>
                <a href="Reminders.php">Reminders</a>
    
                <button class="lg_btn" id="logoutButton">Logout</button>

              </div>
          </div>
        </div>
      </header>
    
      <section class="home_sections">
    <h2 class="section_title">Reminders</h2>
    <?php
        // Include database connection
        include 'Partials/dbConn.php';

        // Fetch data from the Reminder table
        $query = "SELECT * FROM Reminder";
        $result = mysqli_query($conn, $query);

        // Check if there are any notifications
        if (mysqli_num_rows($result) > 0) {
            // Loop through each notification
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="notification">';
                echo '<h3>' . $row['chats'] . '</h3>';
                echo '<p>Reminder DateTime: ' . $row['reminder_datetime'] . '</p>';
                echo '</div>';
            }
        } else {
            // Display a message if there are no notifications
            echo '<p>No notifications found.</p>';
        }

        // Close the database connection
        mysqli_close($conn);
        ?>
</section>

    
<script>
  // Get the button element by its class name
  const logoutButton = document.querySelector('.lg_btn');

  // Add click event listener to the button
  logoutButton.addEventListener('click', function() {
    // Redirect to the specified URL
    window.location.href = 'index.php';
  });
</script>
    </body>
    </html>
    </span>