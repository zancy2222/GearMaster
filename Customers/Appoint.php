<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Alfeo's Auto  Electrical Shop</title>
      <link rel="stylesheet" href="Assets/style.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
      <link rel="stylesheet" href="libs/fullcalendar/main.min.css">
<script src="libs/fullcalendar/main.min.js"></script>
<style>
    .container {
    width: 80%;
    margin: 0 auto;
  }
   #calendar {
    max-width: 100%;
    margin: 20px auto;
    background-color: #fff;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 20px;
  }
  .popup-form {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
    z-index: 9999;
}

.popup-form.active {
    display: block;
}

.popup-form .close {
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    font-size: 24px;
    color: #333;
}

.popup-form form {
    display: grid;
    gap: 10px;
}

.popup-form label {
    font-size: 16px;
    color: #333;
}

.popup-form input[type="text"],
.popup-form input[type="time"],
.popup-form input[type="date"],
.popup-form textarea {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px;
}

.popup-form input[type="submit"] {
    width: 100%;
    padding: 10px;
    border: none;
    border-radius: 5px;
    background-color: #4070f4;
    color: #fff;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.popup-form input[type="submit"]:hover {
    background-color: #265df2;
}
#overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black */
    z-index: 999; /* Ensure it's above other elements */
    display: none; /* Initially hidden */
}

</style>
    </head>
    <body>
      <header>
        <div class="container">
          <div class="nav_bar">
            <div class="logo">
              <i class="fas fa-gear"></i>
              <h4>Alfeo's Auto  Electrical Shop</h4>
            </div>
            
    
              <div class="menu_list">
              <a href="Main.php" style="text-decoration: none;">Home</a>
            <a href="Appoint.php" style="text-decoration: none;">Book an Appointment</a>
            <a href="Reminders.php" style="text-decoration: none;">
              <i class="fas fa-bell"></i> Reminders
            </a>
                <button class="lg_btn" id="logoutButton">Logout</button>

              </div>
          </div>
        </div>
      </header>
      <div id="overlay"></div>

      <div class="popup-form" id="popupForm">
    <span class="close" onclick="closePopupForm()">&times;</span>
    <form action="Partials/get-appointments.php" method="post">
        <label for="customer_name">Customer Name:</label>
        <input type="text" name="customer_name" placeholder="Customer Name" required>

        <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']; ?>" /> <!-- Assuming you store user_id in session -->

        <label for="gear_types">Gear Types:</label>
        <input type="text" name="gear_types" placeholder="Gear Types" required>

        <label for="messages">Messages:</label>
        <textarea name="messages" placeholder="Enter your message"></textarea>
 
        <label for="reserve_time">Reserve Time:</label>
        <input type="time" name="reserve_time" required>

        <input type="hidden" name="schedule" id="schedule">

        <input type="submit" value="Book Appointment">
    </form>
</div>



    
      <section class="container">
      <div id="calendar"></div>

      </section>

      <script src="libs/moment/moment.min.js"></script>
<script src="libs/jquery/jquery.min.js"></script>
<script src="libs/fullcalendar/main.min.js"></script>
<link rel="stylesheet" href="libs/fullcalendar/main.min.css">
    
<script>
 document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'dayGridMonth',
      events: [],
      dateClick: function(info) {
        handleDateClick(info.date);
      },
    });

    calendar.render();
  });
  function handleDateClick(date) {
    var currentDate = new Date(); // Get the current date

    // Compare the selected date with the current date
    if (date < currentDate && !isSameDay(date, currentDate)) {
        alert("Can't book on past dates.");
    } else {
        var dayOfWeek = date.getDay();

        if (dayOfWeek === 0) {
            alert("Sunday is not available.");
        } else {
            // Format the date as per your requirement
            var formattedDate = formatDate(date);

            // Set the formatted date to the hidden input field
            document.getElementById("schedule").value = formattedDate;

            // Open the pop-up form
            openPopupForm();
        }
    }
}


function isSameDay(date1, date2) {
  return date1.getFullYear() === date2.getFullYear() &&
    date1.getMonth() === date2.getMonth() &&
    date1.getDate() === date2.getDate();
}
  
function openPopupForm() {
  document.getElementById('overlay').style.display = 'block';
  document.getElementById('popupForm').style.display = 'block';
}

function closePopupForm() {
  document.getElementById('overlay').style.display = 'none';
  document.getElementById('popupForm').style.display = 'none';
}

function formatDate(date) {
  var year = date.getFullYear();
  var month = (date.getMonth() + 1).toString().padStart(2, '0');
  var day = date.getDate().toString().padStart(2, '0');
  return year + '-' + month + '-' + day;
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