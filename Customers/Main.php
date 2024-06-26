<span style="font-family: verdana, geneva, sans-serif;">
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="UTF-8" />
    <title>Alfeo's Auto Electrical Shop</title>
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
            <h4>Alfeo's Auto Electrical Shop</h4>
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

    <section class="home_section">
      <div class="overlay">
        <div class="container">
          <div class="home">
            <h1><span>Secure</span> Your <br>Adventure <span>Gear Up</span> <br><span>Reserve</span> Now!</h1>
            <div class="home_buttons">
            </div>
            <div class="services_boxes">
              <div class="box">
                <i class="fas fa-car"></i>

              </div>

              <div class="box br">
                <i class="fa fa-motorcycle" aria-hidden="true"></i>
              </div>

              <div class="box">
                <i class="fas fa-cogs"></i>

              </div>
            </div>
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