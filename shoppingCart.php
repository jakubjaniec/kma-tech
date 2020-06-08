<?php

if (!session_id()) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:shoppingCart.php');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KOSZYK | KMA-TECH</title>
    <link rel="shortcut icon" href="./imgs/kma-tech-icon.svg" type="image/x-icon">
    <link rel="stylesheet" href="./styles/shoppingCart.css">
</head>

<body>

    <section>
        <nav class="navigation">
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
            <a href="index.php" class="back-btn">
                <div></div>
            </a>
        </nav>

        <div class="mobile-gallery gallery">
            <?php

$conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

$result = mysqli_query($conn, "SELECT * FROM products WHERE category = 'router'");

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='" . $row['image'] . "'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><button>dodaj do koszyka</button></div></div>";
    }
}

?>
        </div>
    </section>
    <section></section>

    <script>
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
    </script>
</body>

</html>