<?php

require_once('./classes/Product.php');

// How to load data
//Product::getProducts('./data/products.json');
$product = null;
if (isset($_GET['id'])) {
    $product = Product::find($_GET['id']); // 2 dalis
}
?>


<html>

<head>
    <title>
        <?php if ($product != null) {
            echo $product->title;
        } else {
            echo "Produktas nerastas";
        } ?>
    </title>
</head>


<body>
    <?php if ($product != null) : ?>
        <div>
            <?php foreach ($product->images as $image) : ?>
                <img src="<?php echo $image ?>" width="420" height="420">
            <?php endforeach; ?>
        </div>
        <div>
            <?php echo "Produkto ID: " . $product->id; ?>
        </div>
        <div>
            <?php echo "Kurejas: " . $product->maker; ?>
        </div>
        <div>
            <?php echo "Tinklapis: " . $product->url; ?>
        </div>
        <div>
            <?php echo "Pavadinimas: " . $product->title; ?>
        </div>
        <div>
            <?php echo "Aprasymas: " . $product->description; ?>
        </div>
        <div>
            <?php echo "Kaina: " . $product->price; ?> EUR
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
    <?php else : echo "Produktas nerastas."; ?>
    <?php endif; ?>
</body>

</html>