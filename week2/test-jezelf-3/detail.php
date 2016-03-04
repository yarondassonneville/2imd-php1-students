<?php
session_cache_limiter('private, must-revalidate');
session_cache_expire(60);
session_start();
include_once('products.inc.php');

//tel aantal producten te gebruiken voor validatie hieronder. Anders mogelijk id 0 niet mogelijk

    if((!empty($_GET['product']) || $_GET['product'] === '0') && is_numeric($_GET['product']) && $_GET['product'] >=0){
        $huidigProduct = $_GET['product'];

        //is er op knop geklikt en is er een product geslecteerd?
        if(isset($_POST['koopnu'])){
            //er is op knop geklikt en er is een product geselecteerd
            startsesie();
        }else{
            //er is niet op knop geklikt of er is geen product geslecteerd
        }

    }else{
        header('location: products.php');
    }

function startsesie(){
    $product_id = $_GET['product']; //haal productid op
    $_SESSION['cart'][] = $product_id; //noem sessie cart en geef product_id mee.
}


    $productdetailNaam = $producten[$huidigProduct]['name'];
    $productdetailPrijs = $producten[$huidigProduct]['price'];
    $productdetailImage = $producten[$huidigProduct]['image'];


?><!doctype html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Detail van <?php print $productdetailNaam; ?></title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>
<body>
<section id="productdetail">
    <div><?php echo $productdetailNaam . " &euro;" . $productdetailPrijs ?></div>
    <img src="<?php print $productdetailImage; ?>" alt="Afbeelding van een <?php print $productdetailNaam; ?>">
    <form action="" method="post">
        <input type="submit" value="Toevoegen aan winkelmandje" name="koopnu">
    </form>
</section>
<section id="cart">
    <?php include_once('cart.inc.php')?>
</section>
</body>
</html>