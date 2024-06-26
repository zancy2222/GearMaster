<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Alfeo's Auto  Electrical Shop</title>
  <link rel="stylesheet" href="Assets/style.css">
  <!-- Font Awesome CDN Link -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
  <style>
/* Styles for contact section */
.contact_section {
  background-color: #f9f9f9;
  padding: 60px 0;
  text-align: center;
}

.contact_section .container {
  max-width: 800px;
  margin: 0 auto;
}

.contact_section .title {
  margin-bottom: 50px;
}

.contact_section .title h1 {
  font-size: 36px;
  color: #333;
}

.contact_section .title .slogan {
  display: block;
  font-size: 18px;
  color: #666;
}

.contact_form {
  margin-bottom: 50px;
}

.contact_form form .form_group {
  margin-bottom: 20px;
}

.contact_form form input[type="text"],
.contact_form form input[type="email"],
.contact_form form textarea {
  width: 100%;
  padding: 15px;
  border: 1px solid #ccc;
  border-radius: 5px;
  font-size: 16px;
}

.contact_form form textarea {
  height: 150px;
}

.contact_form form .submit_btn {
  background-color: #333;
  color: #fff;
  border: none;
  border-radius: 5px;
  padding: 15px 30px;
  font-size: 18px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.contact_form form .submit_btn:hover {
  background-color: #555;
}

.contact_info {
  display: flex;
  justify-content: center;
  gap: 30px;
}

.info_item {
  text-align: left;
}

.info_item i {
  font-size: 24px;
  color: #333;
}

.info_item h4 {
  font-size: 18px;
  color: #333;
  margin-bottom: 10px;
}

.info_item p {
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
          <h4>Alfeo's Auto  Electrical Shop</h4>
        </div>
        <div class="menu_list">
          <a href="index.php">Home</a>
          <a href="about.php">About</a>
          <a href="contact.php" class="active">Contact Us</a>
          <button class="lg_btn" id="loginButton">Login</button>
        </div>
      </div>
    </div>
  </header>

  <section class="contact_section">
  <div class="container">
    <div class="title">
      <h1>Contact Us</h1>
      <span class="slogan">Get in touch with us!</span>
    </div>
    <div class="contact_form">
      <form action="#" method="post">
        <div class="form_group">
          <input type="text" name="name" id="name" placeholder="Your Name" required>
        </div>
        <div class="form_group">
          <input type="email" name="email" id="email" placeholder="Your Email" required>
        </div>
        <div class="form_group">
          <textarea name="message" id="message" placeholder="Your Message" required></textarea>
        </div>
        <button type="submit" class="submit_btn">Send Message</button>
      </form>
    </div>
    <div class="contact_info">
      <div class="info_item">
        <i class="fas fa-map-marker-alt"></i>
        <h4>Location</h4>
        <p>123 Gear Street, Cityville, Country</p>
      </div>
      <div class="info_item">
        <i class="fas fa-phone-alt"></i>
        <h4>Phone</h4>
        <p>+1 123 456 7890</p>
      </div>
      <div class="info_item">
        <i class="fas fa-envelope"></i>
        <h4>Email</h4>
        <p>info@gearmaster.com</p>
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
