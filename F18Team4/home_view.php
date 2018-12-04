<?php include 'view/header.php'; ?>
<?php include 'view/sidebar.php'; ?>
<main class="nofloat">
    <h1>Featured products</h1>
    <p>We have a great selection of musical instruments including
        guitars, basses, and drums. And we're constantly adding more to give
        you the best selection possible!
    </p>
    <div class="card-deck">
        <?php
        foreach ($products as $product) :
            // Get product data
            $list_price = $product['listPrice'];
            $discount_percent = $product['discountPercent'];
            $description = $product['description'];

            // Calculate unit price
            $discount_amount = round($list_price * ($discount_percent / 100.0), 2);
            $unit_price = $list_price - $discount_amount;

            // Get first paragraph of description
            $description_with_tags = add_tags($description);
            $i = strpos($description_with_tags, "</p>");
            $first_paragraph = substr($description_with_tags, 3, $i - 3);
            ?>

            <div class="card">
                <img class="card-img-top" width="286" height="180" 
                     src="images/<?php echo htmlspecialchars($product['productCode']); ?>_s.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="catalog?product_id=<?php echo $product['productID']; ?>">
                            <?php echo htmlspecialchars($product['productName']); ?>
                        </a>
                    </h5>
                    <p class="card-text"><?php echo $first_paragraph; ?></p>
                    <a href="#" class="btn btn-primary">See Detail</a>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</main>
<?php include 'view/footer.php'; ?>