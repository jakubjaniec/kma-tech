<?php

if (!session_id()) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}

if (isset($_POST['id'])) {
    $id_p = $_POST['id'];
    addToCart($id_p);
}
if (isset($_POST['inputId'])) {
    $inputId = $_POST['inputId'];
    $inputValue = $_POST['inputValue'];

    editAmount($inputId, $inputValue);
}
if (isset($_SESSION['id_u'])) {
    $id_u = $_SESSION['id_u'];
}

if (isset($_POST['updatePrice'])) {
    updatePrice();
    exit;
}

function addToCart($id_p)
{
    $id_u = $_SESSION['id_u'];
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    mysqli_query($conn, "INSERT INTO cart VALUES(0, $id_u, $id_p, 1)");
    exit;
}
function editAmount($id, $value)
{
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    mysqli_query($conn, "UPDATE cart SET amount = $value WHERE id_c LIKE $id");
    exit;
}

function updatePrice()
{
    $id_u = $_SESSION['id_u'];
    $total = 0;
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    $query = mysqli_query($conn, "SELECT products.price, products.count, cart.amount FROM cart, products WHERE $id_u LIKE cart.id_u AND products.id_p LIKE cart.id_p");
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_array($query)) {
            $total += $row['amount'] * $row['price'];
        }
    }
    echo $total;
    exit;
}