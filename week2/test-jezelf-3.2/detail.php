<?php

    session_start();

    include_once("products.inc.php");
    
    //Check if the cart is created, if not create it.
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
    }
    
    if(isset($_POST['key'])){
        
        //Check if key is already in array so you can't add the same item twice
        if (!in_array($_POST['key'], $_SESSION['cart'])) {
            
            $_SESSION['cart'][] = $_POST['key'];
            
        }
        
    }

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Products</title>
    </head>

    <body>
        <a href="products.php">Back to products</a>
        <?php
        
            //Get key from url
            $key = $_GET['product'];

            //Print out product info
            echo '<h1>' . $products[$key]["name"] . ' €' . $products[$key]["price"] . '</h1>';
            echo '<img src="images/' . $products[$key]["image"] . '" height="100" width="100">';
            echo '<form method="post" action="">';
            echo '<input type="text" value="'.$key.'" name="key" hidden>';
            echo '<input type="submit" value="BUY NOW">';
            echo '</form>';
        
            //Include shopping cart view
            include_once("cart.inc.php");
        ?>

    </body>

    </html>