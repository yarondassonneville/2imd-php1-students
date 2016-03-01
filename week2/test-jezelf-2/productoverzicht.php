<section id="productoverzicht">
    <h1>Productoverzicht</h1>
    <form action="" method="POST">
        <?php
        //producten uitlussen
        foreach($producten as $product_id => $product_items):
            $productTitle = $product_items['title'];
            $productPrice = $product_items['price'];
            ?>

            <input type="radio" name="productlijst" id="<?php print $product_id; ?>" value="<?php print $product_id; ?>" checked>
            <label for="<?php print $product_id; ?>"><?php print $productTitle . " (&euro;" . $productPrice . ")"; ?></label><br />

        <?php endforeach; ?>
        <input type="submit" value="Add to basket" name="add-to-basket" id="add-to-basket">
    </form>
</section>