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
    <h1 class="text" style="text-align: center; margin-left:35%;">WELCOME ADMIN GOOD DAY!</h1>
    </section>

    <script>
  // Get the element by its ID
  const logOutIcon = document.getElementById('log_out');

  // Add click event listener
  logOutIcon.addEventListener('click', function() {
    // Redirect to the specified URL
    window.location.href = '../Login.php';
  });
</script>

    <script src="Assets/script.js"></script>
  </body>
</html>
