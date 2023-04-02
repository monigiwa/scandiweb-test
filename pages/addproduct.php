<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>
<body>
  <div id="product-form">
    <form action="" method="post">
      <header>
        <nav>
            <div id="product_nav">
                <div id="product_head">
                    <h1 id="h1">Product Add</h1>
                </div>
                <div id="product_btn">
                  <button id="submit-btn" name="submit-btn" type="submit">Save</button>
                  <button type="button" id="cancel" name="cancel"><a href="./index.php">Cancel</a></button> 
                </div>
            </div>
        </nav>
      </header>
      <div id="form-group">
        <label for="sku">SKU</label>
        <input type="text" name="sku" id="sku" placeholder="XER2345" maxlength="7" required><br>
        
        <label for="name">Name</label>
        <input type="text" name="name" id="name" placeholder="product name"><br>

        <label for="price">Price ($)</label>
        <input type="text" name="price" id="price" placeholder="product price ($)"><br>
        <label for="productType">Type Switcher</label>
        <select name="productType" id="productType">
          <option disabled="disabled" selected="selected" value="">Type Switcher</option>
          <option value="DVD" >DVD</option>
          <option value="Furniture">Furniture</option>
          <option value="Book">Book</option>               
        </select><br><br>
        <div id="dvd-info" style="display: none;">
          <label for="size">Size (MB)</label>
          <input type="text" name="size" id="size" placeholder="product size in MB"><br>
          <h3>Please, provide size in MB</h3>
        </div>
        <div id="furniture-info" style="display: none;">
          <label for="height">Height (CM)</label>
          <input type="number" name="height" id="height" placeholder="product size in height CM"><br>
          <label for="width">Width (CM)</label>
          <input type="number" name="width" id="width" placeholder="product size in width CM"><br>

          <label for="length">Length (CM)</label> 
          <input type="number" name="length" id="length" placeholder="product size in length CM"><br>
          <h3>Please, provide dimensions in HxWxL format</h3>
        </div>
        <div id="book-info" style="display: none;">
          <label for="weight">Weight (KG)</label>
          <input type="number" name="weight" id="weight" placeholder="product size in weight KG"><br>
          <h3>Please, provide weight in KG</h3>
        </div>
      </div>
    </form>
  </div>
  <footer>Scandiweb Test Assignment</footer>
<script src="./type.js"></script>
<div class="error-message">
<?php require_once('save.php'); ?>
</div>
</body>
</html>