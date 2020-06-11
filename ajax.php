<?php

if (!session_id()) {
    session_start();
}

if (isset($_GET['logout'])) {
    session_destroy();
    header('location:index.php');
}

if (isset($_POST['id_p'])) {
    $id_p = $_POST['id_p'];
    addToCart($id_p);
}
if (isset($_POST['inputId'])) {
    $inputId = $_POST['inputId'];
    $inputValue = $_POST['inputValue'];

    editAmount($inputId, $inputValue);
}
if (isset($_POST['deleteId'])) {
    $deleteId = $_POST['deleteId'];
    deleteFromCart($deleteId);
}

if (isset($_POST['updatePrice'])) {
    updatePrice();
    exit;
}
if (isset($_POST['updateProducts'])) {
    updateProducts();
    exit;
}

function addToCart($id_p)
{
    $id_u = $_SESSION['id_u'];
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    mysqli_query($conn, "INSERT INTO cart VALUES(0, $id_u, $id_p, 1)");
    $conn->close();
    exit;
}
function editAmount($id, $value)
{
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    mysqli_query($conn, "UPDATE cart SET amount = $value WHERE id_c LIKE $id");
    $conn->close();
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
    $conn->close();
    exit;
}

function deleteFromCart($deleteId)
{
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
    mysqli_query($conn, "DELETE FROM cart WHERE id_c = $deleteId;");
    exit;
}

function updateProducts()
{
    if (isset($_SESSION['id_u'])) {
        $id_u = $_SESSION['id_u'];
        $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');
        $query = mysqli_query($conn, "SELECT products.name,  products.price, products.count, products.image, cart.amount, cart.id_c FROM cart, products WHERE $id_u LIKE cart.id_u AND products.id_p LIKE cart.id_p;");
        if (mysqli_num_rows($query) > 0) {
            while ($row = mysqli_fetch_array($query)) {
                echo "<div class='product'><button class='back-btn' data-btnId='" . $row['id_c'] . "'><div></div></button><img src='" . $row['image'] . "'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><div class='amount-container'><span>ilość:<input type='number' class='amountInput' data-inputid='" . $row['id_c'] . "' value='" . $row['amount'] . "' min='1' max='999'/></span></div></div></div>";
            }
        }
    }
    exit;
}