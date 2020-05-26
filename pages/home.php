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

    <header class="header">
      <?php

      session_start();

      if(isset($_GET['logout'])) {
        session_destroy();
        header('location:home.php');
      }
      ?>
      <nav class="menu">
        <ul>
          <div class="user">
            <?php
          if(!empty($_SESSION['username'])){
          echo "Witaj " . $_SESSION['username'] . "!";


          if($_SESSION['username'] == 'admin') {
          echo "<a href='adminPanel.php' class='admin-panel'>Admin Panel</a>";
          }
          }
          ?>
          </div>
          <li>Strona główna</li>
          <li>O nas</li>
          <li>Usługi</li>
          <li>Switche</li>
          <li>Serwery</li>
          <li>Podzespoły</li>
          <li>Elementy pasywne</li>
          <li>Narzędzia</li>
          <li>Kontakt</li>
          <li>
            <?php

            if(!empty($_SESSION['username'])) {
              echo "<a href='home.php?logout=true'>Wyloguj</a>";
            }

            ?>
          </li>
        </ul>
      </nav>
      <div class="logo">
        <img src="../imgs/kma_logo.png" alt="kma-tech logo">
        <p>najlepszy sklep komputerowy</p>
        <div class="row">
          <?php

            if(empty($_SESSION['username'])) {
              echo "<a href='login.php'>logowanie</a>
              <a href='register.php'>rejestracja</a>";
            }

            ?>
        </div>
      </div>
    </header>

    <section class="products">
      <p>Switche</p>
      <span></span>
      <div class="gallery">
        <div class="product">Switch 1</div>
        <div class="product">Switch 2</div>
        <div class="product">Switch 3</div>
        <div class="product">Switch 4</div>
        <div class="product">Switch 5</div>
      </div>
    </section>
    <section class="products">
      <p>Serwery</p>
      <span></span>
      <div class="gallery">
        <div class="product">Serwer 1</div>
        <div class="product">Serwer 2</div>
        <div class="product">Serwer 3</div>
        <div class="product">Serwer 4</div>
        <div class="product">Serwer 5</div>
      </div>
    </section>
    <section class="products">
      <p>Narzędzia</p>
      <span></span>
      <div class="gallery">
        <div class="product">Narzędzie 1</div>
        <div class="product">Narzędzie 2</div>
        <div class="product">Narzędzie 3</div>
        <div class="product">Narzędzie 4</div>
        <div class="product">Narzędzie 5</div>
      </div>
    </section>

    <footer class="contact">
      <div class="column">
        <h4>Strona zrobiona przez:</h4>
        <p>Janiec Jakub</p>
        <p>Krupa Milan</p>
        <p>Mysior Andrzej</p>
      </div>

      <div class="column">
        <h4>Kontakt:</h4>
        <form>
          <input type="text">
          <input type="text">
          <textarea name="" id="" cols="30" rows="10"></textarea>
          <button>Wyślij</button>
        </form>
      </div>
    </footer>


  </div>

</body>

</html>