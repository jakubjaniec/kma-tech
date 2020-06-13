<?php

if (!session_id()) {
    session_start();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./styles/userPage.css">
</head>

<body>

  <div class="app">
    <div>
      <a href="index.php" class="back-btn">
        <div></div>
      </a>
    </div>
    <h1 class="title">Profil użytkownika</h1>
</body>

</html>