<?php
require_once('dbh.php');
require_once('delete.php');
require_once('config.php');
// require_once('product.php');
// require_once('book.php');
// require_once('furniture.php');
// require_once('dvd.php');
// Retrieve data from database
$pdo = new PDO('mysql:host=localhost;dbname=productlists', 'root', '');
$query = $pdo->query("SELECT * FROM product");
$data = $query->fetchAll(PDO::FETCH_ASSOC);

// Pass the data to the next page using $_SESSION
session_start();
$_SESSION['data'] = $data;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css.css">
</head>
<body>
<div id="products">
  <form action="" method="post">
  <header>
        <nav>
            <div id="product_nav">
                <div id="product_head">
                    <h1 id="h1">Product List</h1>
                </div>
                <div id="product_btn">
                  <button type="button" id="add-btn"><a href="./addproduct.php">ADD</a></button>
                  <button type="submit" id="delete-product-btn" name="delete-product-btn">MASS DELETE</button> 
                </div>
            </div>
        </nav>
    </header>
    <div class="product-grid">
      <?php foreach ($_SESSION['data'] as $row): ?>
      <div class="products">
        <input type="checkbox" class="delete-checkbox" name="delete_checkbox[]" value="<?php echo $row['id']; ?>">
        <div class="common_properties">
          <p class="sku"><?php echo $row['sku']; ?></p>
          <p class="name"><?php echo $row['name']; ?></p>
          <p class="price">$<?php echo $row['price']; ?></p>
          <p class="type">
            <?php echo !empty($row['size']) ? "Size: ".$row['size']." MB" : '' ?>
            <?php echo !empty($row['weight']) ? "Weight: ".$row['weight']." KG" : '' ?>
            <?php echo empty($row['size']) && empty($row['weight']) ? "Dimensions: ".$row['height']."x".$row['width']."x".$row['length'] : '' ?>
          </p>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </form>
</div>    
<footer>Scandiweb Test Assignment</footer>
</body>
</html>