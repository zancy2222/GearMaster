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

.notification {
    margin-bottom: 30px;
    padding: 20px;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease-in-out;
    position: relative;
}

.notification:hover {
    transform: translateY(-5px);
}

.notification h3 {
    margin-top: 0;
    margin-bottom: 10px;
    font-family: 'Roboto', sans-serif;
    font-size: 20px;
    color: #333;
}

.notification p {
    color: #666;
    font-size: 16px;
    line-height: 1.5;
}

.notification .reminder_datetime {
    font-style: italic;
    color: #999;
    font-size: 14px;
}

.reply_button {
    position: absolute;
    top: 10px;
    right: 10px;
    background-color: #007bff;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 15px;
    font-size: 14px;
    cursor: pointer;
    transition: background-color 0.3s ease-in-out;
}

.reply_button:hover {
    background-color: #0056b3;
}

/* Modal styles */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgba(0, 0, 0, 0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
    background-color: #fefefe;
    margin: 15% auto; /* 15% from the top and centered */
    padding: 20px;
    border: 1px solid #888;
    width: 50%; /* Could be more or less, depending on screen size */
    border-radius: 10px;
}

/* Close Button */
.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* Form Styles */
#replyMessage {
    width: 100%;
    height: 100px;
    margin-bottom: 20px;
    resize: none;
}

button[type="submit"] {
    background-color: #4CAF50; /* Green */
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    float: right;
}

button[type="submit"]:hover {
    background-color: #45a049;
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

        // Check if there are any reminders
        if (mysqli_num_rows($result) > 0) {
            // Loop through each reminder
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="notification">';
                echo '<h3>' . $row['chats'] . '</h3>';
                echo '<p>Reminder DateTime: ' . $row['reminder_datetime'] . '</p>';
                // Add the "Reply" button
                echo '<button class="reply_button" data-reminder-id="' . $row['id'] . '">Reply</button>';
                echo '</div>';
            }
        } else {
            // Display a message if there are no reminders
            echo '<p>No reminders found.</p>';
        }

        // Close the database connection
        mysqli_close($conn);
    ?>
</section>

<!-- Pop-up form for replying to reminders -->
<div id="replyForm" class="modal">
    <form class="modal-content" id="replyFormContent" action="Partials/reply_handler.php" method="post">
        <span class="close">&times;</span>
        <h2>Reply to Reminder</h2>
        <textarea id="replyMessage" name="reply_message" placeholder="Enter your reply message here..." required></textarea>
        <input type="hidden" id="reminderId" name="reminder_id" value="">
        <button type="submit">Send</button>
    </form>
</div>



<script>
    // Get the modal
    var modal = document.getElementById("replyForm");

    // Get the button that opens the modal
    var btns = document.querySelectorAll(".reply_button");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks on a "Reply" button, open the modal and set the reminder ID
    btns.forEach(function(btn) {
        btn.onclick = function() {
            var reminderId = this.getAttribute("data-reminder-id");
            document.getElementById("reminderId").value = reminderId;
            modal.style.display = "block";
        }
    });

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
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