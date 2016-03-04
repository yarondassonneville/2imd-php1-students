<?php
        //sessie bestaat?
        global $aantalProductenInMandje, $totaalprijs;
        if(!empty($_SESSION['cart'])){
            //tel aantal producten in mandje
            $aantalProductenInMandje = count($_SESSION['cart']);

            //lus om prijs te berekenen
            for($pid = 0; $pid < $aantalProductenInMandje; $pid++){
                $huidigePid = $_SESSION['cart'][$pid];
                $huidigePrijs = $producten[$huidigePid]['price'];
                $totaalprijs += $huidigePrijs;
            }
        }else{
            $aantalProductenInMandje = 0;
            $totaalprijs = 0;
        }


        if(isset($_POST['stopSessie'])){
            session_destroy();
            header('location: '. $_SERVER['PHP_SELF']);
        }

?>
<section id="basket">
    <div>Shopping basket</div>
    <p>Your basket contains <?php print $aantalProductenInMandje; ?> items for a total of &euro; <?php print $totaalprijs; ?></p>
    <form action="" method="post">
        <input type="submit" value="Stop sessie (testen)" name="stopSessie">
    </form>
</section>