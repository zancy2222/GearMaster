<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>GearMaster Connect - About</title>
  <link rel="stylesheet" href="Assets/style.css" />
  <!-- Font Awesome Cdn Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <style>
/* Styles for about section *//* Styles for about section */
.about_section {
  background-color: #f5f5f5;
  padding: 60px 0;
  text-align: center;
}

.about_section h1, .about_section h2, .about_section p {
  color: #333;
  margin-bottom: 30px;
}

.icon_boxes {
  display: flex;
  justify-content: center;
  align-items: stretch;
  flex-wrap: wrap;
  gap: 30px;
  margin-top: 30px;
}

.icon_box {
  flex: 1 1 calc(33.33% - 30px);
  max-width: 300px;
  padding: 20px;
  background-color: #ffffff;
  border-radius: 15px;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.icon_box:hover {
  transform: translateY(-5px);
}

.icon_box i {
  font-size: 48px;
  color: #333;
  margin-bottom: 20px;
}

.icon_box h4 {
  color: #333;
  font-size: 24px;
  margin-bottom: 10px;
}

.icon_box p {
  color: #666;
  font-size: 16px;
  line-height: 1.5;
}


/* Styles for services section */
.services {
  background-color: #fff;
  padding: 60px 0;
}

.services .title {
  text-align: center;
  margin-bottom: 50px;
}

.services h1 {
  color: #333;
  font-size: 36px;
  margin-bottom: 20px;
}

.services_boxes {
  display: flex;
  justify-content: center;
  align-items: stretch;
  flex-wrap: wrap;
  gap: 30px;
}

.box {
  flex: 1 1 calc(33.33% - 30px);
  max-width: 300px;
  padding: 30px;
  background-color: #ffffff;
  border-radius: 15px;
  text-align: center;
  box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
  transition: transform 0.3s ease;
}

.box:hover {
  transform: translateY(-5px);
}

.box i {
  font-size: 48px;
  color: #333;
  margin-bottom: 20px;
}

.box h4 {
  color: #333;
  font-size: 24px;
  margin-bottom: 15px;
}

.box p {
  color: #666;
  font-size: 16px;
}


  </style>
</head>
<body>
  <header>
    <div class="container">
      <div class="nav_bar">
        <div class="logo">
          <i class="fas fa-gear"></i>
          <h4>GearMaster Connect</h4>
        </div>
        
        <div class="menu_list">
          <a href="index.php">Home</a>
          <a href="about.php" class="active">About</a>
          <a href="contact.php">Contact US</a>
          <button class="lg_btn" id="loginButton">Login</button>
        </div>
      </div>
    </div>
  </header>

  <section class="about_section">
  <div class="container">
    <h1>Enhancing Automotive Repair Services</h1>
    <h2>Through Online Booking and Maintenance Reminders</h2>
    <p>GearMaster Connect is dedicated to revolutionizing the automotive repair industry by providing convenient online booking services and timely maintenance reminders. We understand the importance of keeping your vehicle running smoothly, and our platform is designed to streamline the process, saving you time and hassle.</p>
    <div class="icon_boxes">
      <div class="icon_box">
        <i class="fas fa-calendar-alt"></i>
        <h4>Convenient Booking</h4>
        <p>Book your appointments online at your convenience.</p>
      </div>
      <div class="icon_box">
        <i class="fas fa-cog"></i>
        <h4>Professional Service</h4>
        <p>Experience professional repair and maintenance services.</p>
      </div>
      <div class="icon_box">
        <i class="fas fa-clock"></i>
        <h4>Timely Reminders</h4>
        <p>Receive timely reminders for scheduled maintenance.</p>
      </div>
    </div>
  </div>
</section>


  <section class="services">
    <div class="container">
      <div class="title">
        <h1>Our Services</h1>
        <span class="slogan">Reserve Your Gear Now!</span>
      </div>
      <div class="services_boxes">
        <div class="box">
          <i class="fas fa-calendar-alt"></i>
          <h4>Online Booking</h4>
          <p>Book your appointment conveniently online, saving you time and hassle.</p>
        </div>
      
        <div class="box">
          <i class="fas fa-tools"></i>
          <h4>Repair Services</h4>
          <p>Professional repair services to keep your vehicle running smoothly.</p>
        </div>
      
        <div class="box">
          <i class="fas fa-wrench"></i>
          <h4>Maintenance Reminders</h4>
          <p>Receive timely reminders for scheduled maintenance to maintain your vehicle's performance.</p>
        </div>
      </div>
    </div>
  </section>

  <script>
    // Get the button element by its class name
    const loginButton = document.querySelector('.lg_btn');

    // Add click event listener to the button
    loginButton.addEventListener('click', function() {
      // Redirect to the specified URL
      window.location.href = '../Login.php';
    });
  </script>
</body>
</html>
