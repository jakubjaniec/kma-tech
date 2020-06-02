<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LOGOWANIE | KMA-TECH</title>
  <link rel="stylesheet" href="../styles/login-register.css">
  <link rel="shortcut icon" href="../imgs/kma-tech-icon.svg" type="image/x-icon">
</head>

<body>

  <div class="app">
    <img src="../imgs/login-bg.jpg" alt="" class="bg-rect">
    <div class="form-wrapper">
      <div class="heading">
        <img src="../imgs/kma-tech-icon.svg" alt="kma-tech logo-icon" class="logo-icon">
        <h4>Witaj ponownie!</h4>
      </div>

      <form method="POST">
        <input type="text" name="username" id="login" placeholder="login" autocomplete="off">
        <input type="password" name="password" id="password" placeholder="hasło">
        <button>zaloguj</button>
      </form>

      <?php

    session_start();

    if(!empty($_POST['username']) && !empty($_POST['password'])) {

    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");

    if(mysqli_num_rows($result) > 0){

    while($row = mysqli_fetch_array($result)){

    if(password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
      header("location:home.php");
    } else echo "<p>Wrong username or password</p>";
    }}}

    ?>

      <a href="register.php" class="redirect">
        <span>Nie masz jeszcze konta?</span> <br>
        <span>Zarejestruj się!</span>
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