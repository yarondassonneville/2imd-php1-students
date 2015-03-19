<?php
    
    include_once("classes/Order.class.php");
    include_once("classes/OrderMapper.class.php");

    // If post?
    if($_SERVER['REQUEST_METHOD'] === 'POST') {

        try {

            // Domain object / Entity aanmaken (met magic setter)
            $Order = new Order();
            $Order->Name = $_POST['name'];
            $Order->Destination = $_POST['bestemming'];
            $Order->HowMany = $_POST['howmany'];

            // OrderMapper initialiseren
            $OrderMapper = new OrderMapper();

            // Order saven via ordermapper
            if($OrderMapper->create($Order)) {
                $success = 'Uw bestelling is aanvaard!';
            }
        } 
        catch(Exception $e) {
            $error = $e->getMessage();
        }
    }

    // get all orders
    try {
        // Get all orders via OrderMapper
        $OrderMapper = new OrderMapper();
        $allOrders = $OrderMapper->getAll();
    }
    catch(Exception $e) {
        $errorAllOrders = $e->getMessage();
    }
    

?><!doctype html>
<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if IE 9]>    <html class="no-js ie9" lang="en"> <![endif]-->
<!-- Consider adding an manifest.appcache: h5bp.com/d/Offline -->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en" itemscope itemtype="http://schema.org/Product"> <!--<![endif]-->
<head>
    <meta charset="utf-8">

    <title>Test OOP</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="humans.txt">

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">

    <link rel="stylesheet" href="css/gumby.css">
    <link rel="stylesheet" href="css/style.css">

    <script src="js/libs/modernizr-2.6.2.min.js"></script>
</head>

<body>

<div class="container">

  	<div class="row">
  	  <div class="twelve columns special head">
  	  	<h1>Testground</h1>
  	  </div>
  	</div>

  	<div class="row">
        <div class="four columns"> 
        <p>Zorg dat we een bestelling kunnen plaatsen.</p>
        <h3>Voorwaarden</h3>
        <ol>
            <li style="text-decoration: line-through;">Aantal stuks moet altijd groter dan nul zijn (2 punten).</li>
            <li style="text-decoration: line-through;">bescherm tegen XSS en SQL Injection (2 punten)</li>
            <li style="text-decoration: line-through;">1 item kost 10 Euro. BTW naar België is +21%, voor Nederland +19%. (4 punten)</li>
            <li style="text-decoration: line-through;">print alle bestellingen onderaan uit (4 punten)</li>
            <li style="text-decoration: line-through;">zorg dat fout- of succesboodschappen énkel op de juiste ogenblikken getoond worden. (4 punten)</li>
            <li style="text-decoration: line-through;">zorg dat de bestelling correct in de databank terecht komt via PDO (zie voorbeeld data in de databank) (4 punten)</li>
        </ol>
        </div>
        
            
        <div class="eight columns">
            
            <?php if(isset($success)) {
                echo '<div class="success alert">'. $success . '</div>';
            } ?>
            
            <?php if(isset($error)) {
                echo '<div class="danger alert">'. $error . '</div>';
            } ?>
           
        
            <form method="post" action="">    
              <ul>
                <li class="field"><input name="name" class="text input" type="text" placeholder="Uw naam" /></li>
                <li class="field">
                <div class="picker">
                    <select name="bestemming">
                        <option value="" disabled>Selecteer uw woonplaats</option>
                        <option value="be">België (+21% BTW)</option>
                        <option value="nl">Nederland (+19% BTW)</option>
                    </select>            
                </div>
                </li>
                <li class="field"><input name="howmany" class="number input" type="number" placeholder="Hoeveel stuks?" /></li>
                
                <div class="pretty medium primary btn">
                <input type="submit" value="Bestelling plaatsen" />
                </div>
              </ul>
            </form>
            
            <hr />
            
            <h2>Uw bestellingen:</h2>
            <?php if(isset($errorAllOrders)) {
                echo '<div class="danger alert">'. $errorAllOrders . '</div>';
            } ?>
            <ul>
                <!-- loop over all orders like this:  -->
                <!-- <li>Steve Jobs : 1 to .be = 12.10€</li> -->
                <?php
                    foreach ($allOrders as $o) {
                        echo '<li>'. htmlentities($o->Name) .' : '. htmlentities($o->HowMany) .' to '. htmlentities($o->Destination) .' = &euro;'. htmlentities($o->CalculateTotalCost($o->Destination, $o->HowMany)) .'</li>';
                    }
                ?>
            </ul>             
        </div>    
        
    </div> 

	</div> <!--! end of #container -->

</section>

  <script src="js/libs/gumby.min.js"></script>
  <script src="js/plugins.js"></script>
  <script src="js/main.js"></script>

  </body>
</html>
