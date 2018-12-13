<div>
    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="<?php echo $app_path; ?>">Home</a>
        </li>

        <?php
        require_once('model/database.php');
        require_once('model/category_db.php');

        $categories = get_categories();
        foreach ($categories as $category) :
            $name = $category['categoryName'];
            $id = $category['categoryID'];
            $url = $app_path . 'catalog?category_id=' . $id;
            ?>
            <li class="nav-item">
                <a class="nav-link active" href="<?php echo $url; ?>">
                    <?php echo htmlspecialchars($name); ?>
                </a>
            </li>
        <?php endforeach; ?>

        <?php
        // Check if user is logged in and
        // display appropriate account links
        $account_url = $app_path . 'account';
        $logout_url = $account_url . '?action=logout';
        if (isset($_SESSION['user'])) :
            ?>
            <span class="nav-text"><a class="nav-link" href="<?php echo $account_url; ?>">My Account</a></span>
            <span class="nav-text"><a class="nav-link" href="<?php echo $logout_url; ?>">Logout</a></span>
        <?php else: ?>
            <span class="nav-text"><a class="nav-link btn-primary" href="<?php echo $account_url; ?>">Login</a></span>
        <?php endif; ?>
        <span class="nav-text">
            <a class="nav-link" href="<?php echo $app_path . 'cart'; ?>"><img src="<?php echo $app_path . 'images/cart-2x.png' ?>">Cart</a>
        </span>
    </ul>
</div>
