<?php
session_start(); //start sessie
    //products array opbouwen
    include_once("productdata.php");

    //is er op knop geklikt en is er een product geslecteerd?
    if(isset($_POST['add-to-basket']) && (!empty($_POST['productlijst']) || $_POST['productlijst'] === '0')){
        //er is op knop geklikt en er is een product geselecteerd
        startSessie();
    }else{
        //er is niet op knop geklikt of er is geen product geslecteerd
    }

    function startSessie(){
        $product_id = $_POST['productlijst']; //haal productid op
        $_SESSION['cart'][] = $product_id; //noem sessie cart en geef product_id mee.
    }


include_once('basket.php');


?><!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Productpagina</title>
    <link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>


<?php include_once('productoverzicht.php'); ?>
</body>
</html>