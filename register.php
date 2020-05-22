<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="login-register.css">
</head>
<body>

  <div class="app">
    <a href="login.php">Login</a>
    <h1>Register page</h1>
    <form method="POST">
      <input type="text" name="username" placeholder="username" autocomplete="off">
      <input type="password" name="password" placeholder="password">
      <input type="password" name="submit-password" placeholder="submit password">
      <input type="submit">
    </form>

    <?php

  session_start();

  if(!empty($_POST['username']) && !empty($_POST['password']) && !empty($_POST['submit-password'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];
    $submitPassword = $_POST['submit-password'];

    $conn = mysqli_connect('localhost', 'root', '', 'kma-tech');
    $result = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
    $num = mysqli_num_rows($result);

    if(($password == $submitPassword) && ($num == 0)) {
        mysqli_query($conn, "INSERT INTO users VALUES(0, '$username', '$password')");
    }

    if($password != $submitPassword){
      echo "<p class='validation'>Passwords do not match.</p>";
    }

    if($num != 0) {
      echo "<p class='validation'>Username already taken.</p>";
    }

  }

  ?>

  </div>

  <script>

   if(window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
   }
  </script>
</body>
</html>