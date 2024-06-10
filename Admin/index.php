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
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }

    .graph-container {
        width: 80%;
        margin: 0 auto;
    }

    canvas {
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
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
        <li>
          <a href="Admin_History.php">
          <i class='bx bx-history'></i>
          <span class="links_name">History</span>
          </a>
          <span class="tooltip">History</span>
        </li>

       
        <li>
          <a href="Admin_Summary.php">
          <i class='bx bx-task'></i>
          <span class="links_name">Summary</span>
          </a>
          <span class="tooltip">Summary</span>
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

    <div class="graph-container">
    <h1 class="text" style="text-align: center;">WELCOME ADMIN GOOD DAY!</h1>

        <canvas id="gearTypesChart"></canvas>   
    </div>

  </section>

<?php
// Include database connection
include 'Partials/dbConn.php';

// Fetch data from the Reserve table
$query = "SELECT GearTypes, ReserveDate, COUNT(*) AS count FROM Reserve GROUP BY GearTypes, ReserveDate";
$result = mysqli_query($conn, $query);

// Prepare data for the graph
$gearTypesData = [];
$reserveDates = [];

while ($row = mysqli_fetch_assoc($result)) {
    $gearType = $row['GearTypes'];
    $reserveDate = $row['ReserveDate'];
    $count = $row['count'];

    if (!array_key_exists($gearType, $gearTypesData)) {
        $gearTypesData[$gearType] = [];
    }
    $gearTypesData[$gearType][] = $count;

    if (!in_array($reserveDate, $reserveDates)) {
        $reserveDates[] = $reserveDate;
    }
}

// Convert data to JSON format for JavaScript
$gearTypesJson = json_encode($gearTypesData);
$reserveDatesJson = json_encode($reserveDates);
?>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Retrieve PHP data in JavaScript
    const gearTypesData = <?php echo $gearTypesJson; ?>;
    const reserveDates = <?php echo $reserveDatesJson; ?>;

    // Prepare data for Chart.js
    const datasets = [];
    for (const gearType in gearTypesData) {
        datasets.push({
            label: gearType,
            data: gearTypesData[gearType],
            backgroundColor: getRandomColor(),
            borderWidth: 1
        });
    }

    // Create bar graph
    const ctx = document.getElementById('gearTypesChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: reserveDates,
            datasets: datasets
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: '#f0f2f5'
                    },
                    ticks: {
                        font: {
                            size: 14,
                            family: "'Montserrat', sans-serif"
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 14,
                            family: "'Montserrat', sans-serif"
                        }
                    }
                }
            },
            plugins: {
                title: {
                    display: true,
                    text: 'Gear Types Reservation Chart',
                    font: {
                        size: 18,
                        family: "'Montserrat', sans-serif"
                    }
                },
                legend: {
                    display: true,
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14,
                            family: "'Montserrat', sans-serif"
                        }
                    }
                }
            }
        }
    });

    // Function to generate random colors
    function getRandomColor() {
        return `rgba(${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, ${Math.floor(Math.random() * 256)}, 0.7)`;
    }
</script>
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
