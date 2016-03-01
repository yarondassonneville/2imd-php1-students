<?php


 if(!empty($_SESSION['cart'])) {

     echo "<div>Uw winkelwagen bevat de volgende artikels:</div><ul>";
     $sessieId = $_SESSION['cart'];


     //lus om prijs te berekenen
     $aantalProductenInMandje = count($_SESSION['cart']);
     for($pid = 0; $pid < $aantalProductenInMandje; $pid++){
         $huidigePid = $_SESSION['cart'][$pid];
         $huidigePrijs = $producten[$huidigePid]['price'];
         $huidigeNaam = $producten[$huidigePid]['name'];
         echo "<li>Product : " . $huidigeNaam . " twv &euro; " . $huidigePrijs . "</li>";
     }
     echo "</ul>";
 }else{
    echo "<div>Er zijn geen producten in uw winkelmandje.</div>";
}


