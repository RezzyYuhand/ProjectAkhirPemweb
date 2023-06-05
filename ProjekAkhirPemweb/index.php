<?php
require_once "db/dbconnect.php";


$sql = "SELECT SUM(nominal) AS total_sum FROM donation"; 

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $totalSum = $row["total_sum"];
} else {
    $totalSum = 0;
}

// Close the connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- font -->

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
      integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:wght@800&family=Poppins:wght@400;600;700&display=swap"
      rel="stylesheet"
    />

    <!-- css -->
    <link rel="stylesheet" href="css/style.css" />

    <title>GREEN GIVERS</title>
  </head>
  <body>
    <header>
      <div class="navbar">
        <div class="container">
          <div class="box-navbar">
            <a href="index.html">
              <img class="logo" src="img/logoGGputih2-02.png" alt="" />
            </a>
            <ul class="menu">
              <li><a href="pages/article.html">Article</a></li>
              <li><a href="pages/signup.html">Donate</a></li>
              <li class="active"><a href="pages/login.html">Login</a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>
    <main>
      <div class="hero">
        <div class="container">
          <div class="box-hero">
            <h1>SAVE THE FOREST</h1>
            <p>
              Stop deforestation and plant more trees than<br />
              ever. The environment in which we live is peaceful<br />
              and pure. We walk as much as possible; it will<br />
              protect your health and the environment as well.<br />
              All people should plant and protect trees.
            </p>
            <a href="pages/signup.html">JOIN THE MOVEMENT</a>
          </div>
          <div class="info-gain">
            <h2>Total Donation Gained</h2>
            <h1> Rp <?php echo $totalSum; ?>,00</h1>
          </div>
        </div>
      </div>
    </main>
    <div class="wrap">
      <div class="mission">
        <div class="container">
          <img class="img-mission" src="img/infoimage.jpg" alt="" />
          <div class="box-info">
            <div class="mission-content-1">
              <h1 class="first-title">100% Trusted</h1>
              <p>
                All your donation will be allocated for<br />
                reforestation and environmental goods.<br />
                A lot of people has donated for a better green<br />
                worlds.
              </p>
            </div>
            <div class="mission-content-2">
              <h1>Our mission is to create a</h1>
              <h1 class="second-title">better environments.</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="information">
      <div class="container">
        <div class="info-title">
          <h1>Contribute Now, Save The Planet</h1>
          <p>
            with your help, we can conserve the world's<br />
            natural landscapes and the green ecosystems.
          </p>
        </div>
        <div class="box-info-card">
          <div class="info-card">
            <div class="card">
              <img src="img/icons8-potted-plant-100.png" alt="" />
              <p>
                1000+ Trees<br />
                planted to<br />
                regenerate the<br />
                forest
              </p>
            </div>
            <div class="card">
              <img src="img/icons8-windy-weather-100.png" alt="" />
              <p>
                400K+ Oxygen<br />
                restored, and<br />
                reduced air <br />
                polution
              </p>
            </div>
            <div class="card">
              <img src="img/icons8-bin-windows-96.png" alt="" />
              <p>
                2M+ Reduced<br />
                waste in your<br />
                environment
              </p>
            </div>
          </div>
        </div>
        <a href="#">Back To Top</a>
      </div>
    </div>
    <footer>
      <div class="coppyright">
        <p>©2023 | All Rights Reserved</p>
      </div>
    </footer>
  </body>
</html>
