<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>

<!-- content -->


<div class="content">
    <?php if (count((array) $data['featured']) > 0 && $data['featured'] != false) :  ?>

        <div class="products-container">

            <div class="products">


                <?php foreach ($data['featured'] as $product) : ?>

                    <div class="product" draggable="true">

                        <div class="top">
                            <img src="<?php echo SITE_URL; ?>/public/extras/<?php echo $product->product_image; ?>" style="width: 300px;height: 200px;object-fit: auto;" alt="Product /">
                        </div>

                        <div class="bottom">
                            <p><?php echo $product->product_name; ?></p>
                            <p><?php echo $product->product_caption; ?></p>
                            <p class="amount"><?php echo $product->product_price; ?></p>

                            <a href="<?= SITE_URL . '/admins/product/?id=' . $product->product_id; ?>">View <i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                        </div>

                    </div>

                <?php endforeach; ?>


            </div>

        </div>

    <?php else : ?>
        <div class="container my-5 text-center">
            <span class="alert alert-danger">No featured products yet!</span>
        </div>
    <?php endif; ?>
</div>


<script src="<?php echo SITE_URL ?>/public/js/amount.js"></script>

<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>