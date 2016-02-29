<?php
    session_start();

    include_once("products.inc.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>

    <?php
    
        foreach($products as $product){
            
            //Get the key of this item
            $key = array_search($product, $products);
            
            //Print out product info
            echo '<li>';
            echo '<h1>' . $product["name"] . ' €' . $product["price"] . '</h1>';
            echo '<img src="images/' . $product["image"] . '" height="100" width="100">';
            echo '<a href="detail.php?product='.$key.'">More Info</a>';
            echo '</li>';
            
            
        }
    
        //Include shopping cart view
        include_once("cart.inc.php");
    ?>

</body>
</html>