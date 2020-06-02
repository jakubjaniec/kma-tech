<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>KMA-TECH</title>
  <link rel="stylesheet" href="../styles/home.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="shortcut icon" href="../imgs/kma-tech-icon.svg" type="image/x-icon">
</head>

<body>

  <div class="app">

    <header class="header">
      <div class="header__bg">\
        <img src="../imgs/home-bg.png" alt="">
      </div>
      <?php

      session_start();

      if(isset($_GET['logout'])) {
        session_destroy();
        header('location:home.php');
      }
      ?>
      <nav class="navigation">
        <button class="navigation__burger burger">
          <span class="burger__box">
            <span class="burger__inner"></span>
          </span>
        </button>
        <div class="navigation__menu">
          <div class="navigation__user">

            <?php
            if(!empty($_SESSION['username'])){
            echo "<span class='navigation__username'>" . $_SESSION['username'] . "</span><img src='../imgs/user-img.svg'>";
            }
            ?>

          </div>
          <ul>
            <li>Strona główna</li>
            <li>Usługi</li>
            <li>Switche</li>
            <li>Serwery</li>
            <li>Podzespoły</li>
            <li>Narzędzia</li>
            <li>Kontakt</li>
            <?php

            if(!empty($_SESSION['username'])) {
              echo "<li class='logout'><a href='home.php?logout=true'>Wyloguj</a></li>";
            }
            ?>
          </ul>
        </div>
        <div class="navigation__right-wrapper">
          <div class="navigation__searchbox">
            <input type="text" placeholder="szukaj" class="navigation__search">
            <i class="fa fa-search" aria-hidden="true"></i>
          </div>
          <img src="../imgs/shopping-cart.svg" alt="">
        </div>
      </nav>
      <div class="heading">
        <img src="../imgs/kma-tech-logo.svg" alt="kma-tech logo" class="heading__logo">
        <p class="heading__title">najlepszy sklep komputerowy</p>
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

    <footer class="footer">
      <div class="footer__authors">
        <h4>Twórcy</h4>
        <p>Janiec Jakub</p>
        <p>Krupa Milan</p>
        <p>Mysior Andrzej</p>
      </div>
      <div class="footer__about">
        <h4>O nas</h4>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, voluptates, harum recusandae deleniti, nulla
          vitae cupiditate repudiandae laboriosam quasi veniam exercitationem eos! Ea voluptas autem officia cumque
          quasi!</p>
      </div>
      <div class="footer__contact">
        <h4>Kontakt</h4>
        <form>
          <label for="name">Imię</label>
          <input type="text" id="name" require>
          <label for="email">Adres e-mail</label>
          <input type="email" id="email" require>
          <label for="message">Wiadomość</label>
          <textarea id="message" require></textarea>
          <button>Wyślij</button>
        </form>
      </div>
    </footer>


  </div>
  <script src="../js/home.js"></script>
</body>

</html>