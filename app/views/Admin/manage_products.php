<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>

<!-- content -->


<div class="content">

    <div class="products-container">

        <div class="products">

            <?php if ($data['message'] == "ok") :  ?>

                <?php foreach ($data['products'] as $product) : ?>

                    <div class="product" draggable="true">

                        <div class="top">
                            <img src="<?php echo SITE_URL; ?>/public/extras/<?php echo $product->product_image; ?>" style="width: 300px;height: 200px;object-fit: auto;" alt="Product /">
                        </div>

                        <div class="bottom">
                            <p><?php echo $product->product_name; ?></p>
                            <p><?php echo $product->product_caption; ?></p>
                            <p class="amount"><?php echo $product->product_price; ?></p>

                            <a href="">View <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>

                    </div>

                <?php endforeach; ?>

            <?php endif; ?>

        </div>

        <div class="page-counter-container">
            <strong>Page <?php echo $data['page'] . " of " . $data['total_num_of_pages']; ?></strong>
        </div>

    </div>




</div>


<script src="<?php echo SITE_URL ?>/public/js/amount.js"></script>

<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>