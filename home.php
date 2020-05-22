<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

  <div class="app">

  <a href="home.php?logout=true">Logout</a>

  <?php

  session_start();
  echo "<h1>Welcome " . $_SESSION['username'] . "</h1>";

  if(isset($_GET['logout'])) {
    session_destroy();
    header('location:login.php');
  }

  ?>
  </div>

</body>
</html>