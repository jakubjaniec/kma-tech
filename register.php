<?php 

if ( !session_id() ) {
session_start();
}

if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['submit-password'])) {

  $username = $_POST['username'];
  $password = $_POST['password'];
  $submitPassword = $_POST['submit-password'];

  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
  $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

  if(($password == $submitPassword) && (mysqli_num_rows($result) == 0)) {
      mysqli_query($conn, "INSERT INTO users VALUES(0, '$username', '$hashedPassword')");
      header("location:login.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>REJESTRACJA | KMA-TECH</title>
  <link rel="stylesheet" href="./styles/login-register.css">
  <link rel="shortcut icon" href="./imgs/kma-tech-icon.svg" type="image/x-icon">
</head>

<body>

  <div class="app">

    <img src="./imgs/login-bg.jpg" alt="" class="bg-rect">
    <div class="form-wrapper">
      <a href="index.php" class="back-btn">
        <div></div>
      </a>
      <div class="heading">
        <img src="./imgs/kma-tech-icon.svg" alt="kma-tech logo-icon" class="logo-icon">
        <h4>Witaj w naszym serwisie!</h4>
      </div>

      <form method="POST">
        <input type="text" name="username" placeholder="login" autocomplete="off" required>
        <input type=" password" name="password" placeholder="hasło" required>
        <input type="password" name="submit-password" placeholder="potwierdź hasło" required>
        <button class="form-btn">dalej</button>
      </form>

      <a href="login.php" class="redirect">
        <span>Masz już konto?</span> <br>
        <span>Zaloguj się!</span>
      </a>

    </div>
  </div>

  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>