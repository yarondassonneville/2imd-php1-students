<h2>Products in your cart</h2>
<ul>


    <?php
    
    if(empty($_SESSION['cart'])){
        
        echo "Your cart is empty.";
        
    }else{
        
        foreach($_SESSION['cart'] as $item){
        
            echo "<li>" . $products[$item]["name"] . " " . $products[$item]["price"] . "</li>";

        }
        
    }

?>


</ul>