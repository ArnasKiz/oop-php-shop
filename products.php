<?php

require_once('./classes/Product.php');

$products = Product::getProducts('./data/products.json');
?>

<html>

<head>
  <title>
    Produktu Sarasas
  </title>
</head>

<body>

  <div>
    <?php foreach ($products as $product) : ?>
      <span>
        <div>
          <a href="<?php echo "./product.php?id=" . $product->id ?>"><img src="<?php echo $product->images[0] ?>" width="420" height="420"></a>
        </div>
        <div>
          <b><?php echo $product->title; ?></b>
        </div>
        <div>
          <?php echo $product->price; ?> EUR
        </div>
        <div>
          Ivertinimas:
          <?php
          if ($product->avg_rating) {
            echo $product->avg_rating;
          } else {
            echo "Nera duomenu";
          }
          ?>
        </div><br>
      </span>
    <?php endforeach; ?>
  </div>

</body>

</html>