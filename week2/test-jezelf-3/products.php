<?php
session_start();
include_once('products.inc.php');

//print_r($_SESSION['cart']);
?><!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Alle prodcuten</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>


<ul>
    <?php foreach ($producten as $product_id => $product_value): //name,price,img
        //lus producten uit products.inc.php
        $productNaam = $product_value['name'];
        $productPrijs = $product_value['price'];
        $productAfbeelding = $product_value['image'];
        ?>
        <li>
            <div><?php echo $productNaam . " &euro;" . $productPrijs; ?></div>
            <img src="<?php print $productAfbeelding; ?>" alt="Afbeelding van een <?php $productNaam; ?>">
            <a href="detail.php?product=<?php print $product_id; ?>">Meer info</a>
        </li>
    <?php endforeach; ?>
</ul>
<section id="cart">
    <?php include_once('cart.inc.php') ?>
</section>
</body>
</html>