<?php

if (!session_id()) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}
if (isset($_SESSION['id_u'])) {
    $id_u = $_SESSION['id_u'];
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
        <p class="section-title">Razem:
            <?php
$total = 0;
if (isset($_SESSION['id_u'])) {
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    $query = mysqli_query($conn, "SELECT products.price, products.count, cart.amount FROM cart, products WHERE $id_u LIKE cart.id_u AND products.id_p LIKE cart.id_p");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $total += $row['amount'] * $row['price'];
        }

    }
}
echo "<span class='totalPrice'>$total</span> PLN";

?>
        </p>
        <span class="underline"></span>
        <div class="mobile-gallery gallery">
            <?php
if (isset($_SESSION['id_u'])) {
    $query = mysqli_query($conn, "SELECT products.name,  products.price, products.count, products.image, cart.amount, cart.id_c FROM cart, products WHERE $id_u LIKE cart.id_u AND products.id_p LIKE cart.id_p;");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            echo "<div class='product'><button class='back-btn' data-btnId='" . $row['id_c'] . "'><div></div></button><img src='" . $row['image'] . "'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><div class='amount-container'><span>ilość:<input type='number' class='amountInput' data-inputid='" . $row['id_c'] . "' value='" . $row['amount'] . "' min='1' max='999'/></span></div></div></div>";
        }
    }
    $conn->close();
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
    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script>
    $(document).ready(function() {


        //---------------------------------------- changing amount of product
        $(document).on('change', '.amountInput', function() {
            var inputValue = $(this).val();
            var inputId = $(this).attr('data-inputid');
            var ajaxurl = 'ajax.php',
                data = {
                    'inputValue': inputValue,
                    'inputId': inputId
                };
            $.post(ajaxurl, data)


            // --------------------------------- updating price from database

            $('.totalPrice').load("ajax.php", {
                updatePrice: true
            })
        });
        // --------------------------------- removing product from cart
        $(document).on('click', '.product .back-btn', function() {


            let deleteId = $(this).attr('data-btnId');
            let ajaxurl = 'ajax.php',
                data = {
                    'deleteId': deleteId
                };
            $.post(ajaxurl, data)

            $('.gallery').load("ajax.php", {
                updateProducts: true
            })
            $('.totalPrice').load("ajax.php", {
                updatePrice: true
            })
        })
    });
    </script>
</body>

</html>