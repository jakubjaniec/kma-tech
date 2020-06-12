<?php

if (!session_id()) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMA-TECH</title>
    <link rel="stylesheet" href="./styles/index.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="./imgs/kma-tech-icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.3/glider.min.css">
</head>

<body>
    <div class="app">

        <header class="header">
            <div class="header__bg">
                <img src="./imgs/home-mobile-bg.png" class="header__mobile-bg">
                <img src="./imgs/home-desktop-bg.png" class="header__desktop-bg">
            </div>
            <nav class="navigation">
                <button class="navigation__burger burger">
                    <span class="burger__box">
                        <span class="burger__inner"></span>
                    </span>
                </button>
                <div class="navigation__menu">
                    <div class="navigation__user">

                        <?php
if (!empty($_SESSION['username']) && $_SESSION['username'] != 'admin') {
    echo "<a href='userPage.php'><img src='./imgs/user-img.svg'><span class='navigation__username'>" . $_SESSION['username'] .
        "</span></a>";
} else if (!empty($_SESSION['username']) && $_SESSION['username'] == 'admin') {
    echo "<a href='adminPanel.php'><img src='./imgs/user-img.svg'><span class='navigation__username'>" .
        $_SESSION['username'] .
        "</span></a>";
}
?>

                    </div>
                    <ul>
                        <li class="home-li">Strona główna</li>
                        <li class="section1-li">Switche</li>
                        <li class="section2-li">Serwery</li>
                        <li class="section3-li">Pozostałe</li>
                        <li class="contact-li">Kontakt</li>
                        <?php

if (!empty($_SESSION['username'])) {
    echo "<li class='logout'><a href='index.php?logout=true'>Wyloguj</a></li>";
}
?>
                    </ul>
                </div>
                <div class="navigation__right-wrapper">
                    <div class="navigation__searchbox">
                        <input type="text" placeholder="szukaj" class="navigation__search">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                    <a href="shoppingCart.php"><img src="./imgs/shopping-cart.svg" alt="" class="navigation__cart"></a>
                </div>
            </nav>
            <div class="heading">
                <img src="./imgs/kma-tech-logo.svg" alt="kma-tech logo" class="heading__logo">
                <p class="heading__title">najlepszy sklep komputerowy</p>
                <div class="row">
                    <?php

if (empty($_SESSION['username'])) {
    echo "<a href='login.php'>logowanie</a>
              <a href='register.php'>rejestracja</a>";
}

?>
                </div>
            </div>
        </header>

        <section class="products carousel1">
            <p class="section-title">Switche</p>
            <span class="underline"></span>
            <button class="carousel-btn-left">
                <div></div>
            </button>
            <div class="mobile-gallery gallery">
                <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'switch'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><button class='addButton' value=" . $row['id_p'] . ">dodaj do koszyka</button></div></div>";

    }
}

?>
            </div>
            <div class="gallery glider1">
                <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'switch'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " ZŁ</span><button class='addButton' value=" . $row['id_p'] . ">dodaj do koszyka</button></div>";
    }
}

?>
            </div>
            <button class="carousel-btn-right">
                <div></div>
            </button>
        </section>
        <section class="products carousel2">
            <p class="section-title">Routery</p>
            <span class="underline"></span>
            <button class="carousel-btn-left">
                <div></div>
            </button>
            <div class="mobile-gallery gallery">
                <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'router'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><button class='addButton' value=" . $row['id_p'] . ">dodaj do koszyka</button></div></div>";
    }
}

?>
            </div>
            <div class="gallery glider2">
                <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'router'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " ZŁ</span><button class='addButton' value=" . $row['id_p'] . ">dodaj do koszyka</button></div>";
    }
}

?>
            </div>
            <button class="carousel-btn-right">
                <div></div>
            </button>
        </section>
        <section class="products carousel3">
            <p class="section-title">Pozostałe</p>
            <span class="underline"></span>
            <button class="carousel-btn-left">
                <div></div>
            </button>
            <div class="mobile-gallery gallery">
                <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'other'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><button class='addButton' value=" . $row['id_p'] . ">dodaj do koszyka</button></div></div>";
    }
}

?>
            </div>
            <div class="gallery glider3">
                <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'other'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " ZŁ</span><button class='addButton' value=" . $row['id_p'] . ">dodaj do koszyka</button></div>";
    }
}

?>
            </div>
            <button class="carousel-btn-right">
                <div></div>
            </button>
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
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quo, voluptates, harum recusandae deleniti,
                    nulla
                    vitae cupiditate repudiandae laboriosam quasi veniam exercitationem eos! Ea voluptas autem officia
                    cumque
                    quasi!</p>
            </div>
            <div class="footer__contact">
                <h4>Kontakt</h4>
                <form>
                    <label for="name">Imię</label>
                    <input type="text" id="name" require autocomplete="off">
                    <label for="email">Adres e-mail</label>
                    <input type="email" id="email" require autocomplete="off">
                    <label for="message">Wiadomość</label>
                    <textarea id="message" require autocomplete="off"></textarea>
                    <button>Wyślij</button>
                </form>
            </div>
        </footer>


    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/glider-js/1.7.3/glider.min.js"></script>
    <script src="./js/index.js"></script>
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.addButton').click(function() {
            var clickBtnValue = $(this).val();
            var ajaxurl = 'ajax.php',
                data = {
                    'id_p': clickBtnValue
                };
            $.post(ajaxurl, data, function(response) {
                alert("produkt dodano do koszyka");
            });
        });
    });
    </script>
</body>

</html>