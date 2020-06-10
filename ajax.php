<?php

if (!session_id()) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:shoppingCart.php');
}

if (isset($_POST['id'])) {
    $id_p = $_POST['id'];
    addToCart($id_p);
}

function addToCart($id_p)
{
    $id_u = $_SESSION['id_u'];
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    mysqli_query($conn, "INSERT INTO cart VALUES(0, $id_u, $id_p, 1)");
    exit;
}