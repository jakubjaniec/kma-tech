<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KMA-TECH</title>
  <link rel="stylesheet" href="../styles/home.css">
</head>
<body>

  <div class="app">

  <a href="home.php?logout=true">Wyloguj</a>

  <?php

  session_start();
  echo "<h1>Witaj " . $_SESSION['username'] . "</h1>";

  if(isset($_GET['logout'])) {
    session_destroy();
    header('location:login.php');
  }

  if($_SESSION['username'] == 'admin') {
    echo "<a href='adminPanel.php' class='admin-panel'>Admin Panel</a>";
  }

  ?>
  </div>

</body>
</html>