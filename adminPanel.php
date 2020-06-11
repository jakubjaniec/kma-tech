<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN PANEL</title>
  <link rel="stylesheet" href="./styles/adminPanel.css">
</head>

<body>
  <div class="app">
    <a href="index.php" class="back-btn">
      <div></div>
    </a>
    <button class="add-product-btn">
      +
    </button>

    <div class="add-product-form">
      <form method="POST" reuire>
        <label for="name">Nazwa produktu</label>
        <input type="text" id="name" name="name" required>
        <label for="category">Kategoria</label>
        <select id="category" name="category">
          <option value="switch">switch</option>
          <option value="router">router</option>
          <option value="other">inne</option>
        </select>
        <label for="price">Cena</label>
        <input type="number" id="price" name="price" required>
        <label for="count">Ilość</label>
        <input type="number" id="count" name="count" required>
        <label for="image">Link do obrazka</label>
        <input type="text" id="image" name="image" required>
        <button>dodaj produkt</button>
      </form>
    </div>

    <?php  
  
  $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

  if(!empty($_POST['name']) && !empty($_POST['price']) && !empty($_POST['count'])) {
    
    $name = $_POST['name'];
    $category = $_POST['category'];
    $price = $_POST['price'];
    $count = $_POST['count'];
    $image = $_POST['image'];

    $query = "INSERT INTO products VALUES('0', '$name', '$category', '$price', '$count', '$image')";

    if(mysqli_query($conn, $query));
    echo "<script>alert('Produkt pomyślnie dodany do bazy!')</script>";
  }
  
  ?>


    <div class="products-list">
      <?php 
    
    $conn = mysqli_connect('remotemysql.com', '3Atj7OvE8S', 'D0TFKvjonl', '3Atj7OvE8S');

    $result = mysqli_query($conn, "SELECT * FROM products");

    if(mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_array($result)) {
        echo "<div class='product'><img src='". $row['image'] ."'/><div><p>" . $row['name'] . "</p><span class='price'>Cena: " . $row['price'] . " PLN</span><button name='delete-btn'>usuń produkt</button></div></div>";
      }
    }

    ?>
    </div>

  </div>

  <script>
    const addProductBtn = document.querySelector('.add-product-btn')
    const addProductForm = document.querySelector('.add-product-form')

    const toggleAddProductForm = () => {
      addProductForm.classList.toggle('form--active')
      addProductBtn.classList.toggle('btn--active')
    }


    addProductBtn.addEventListener('click', toggleAddProductForm)

    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>
</body>

</html>