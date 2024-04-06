<span style="font-family: verdana, geneva, sans-serif;"><!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8" />
      <title>Gear Master</title>
      <link rel="stylesheet" href="Assets/style.css" />
      <!-- Font Awesome Cdn Link -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
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
    
      <section class="home_section">
        <div class="overlay">
          <div class="container">
            <div class="home">
              <h1><span>Secure</span> Your <br>Adventure <span>Gear Up</span> <br><span>Reserve</span> Now!</h1>
              <div class="home_buttons">
              </div>
            </div>
          </div>
        </div>
        
      </section>
    
      <section class="services">
        <div class="container">
          <div class="title">
            <h1>Reserve Your <span>Adventure Gear!</span></h1>
            <span class="slogan">Reserve Your Gear Now!</span>
          </div>
          <div class="services_boxes">
            <div class="box">
              <i class="fa-solid fa-calendar-alt"></i>
              <h4>Online Booking</h4>
              <p>Book your appointment conveniently online, saving you time and hassle.</p>
            </div>
          
            <div class="box br">
              <i class="fa-solid fa-tools"></i>
              <h4>Repair Services</h4>
              <p>Professional repair services to keep your vehicle running smoothly.</p>
            </div>
          
            <div class="box">
              <i class="fa-solid fa-wrench"></i>
              <h4>Maintenance Reminders</h4>
              <p>Receive timely reminders for scheduled maintenance to maintain your vehicle's performance.</p>
            </div>
          </div>
          
      </div>
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