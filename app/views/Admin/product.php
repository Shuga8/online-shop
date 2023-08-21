<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>


<!-- content -->

<?php

extract($data['product']);

?>

<a class="btn btn-success px-2 m-3 text-white" href="javascript:void(0)" onclick="location.href=history.back()">
    <i class="fa-solid fa-arrow-left"></i>
</a>


<div class="content">

    <div class="container mt-5">
        <div class="site-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="<?= SITE_URL . '/public/extras/' . $product_image ?>" alt="Image" class="img-fluid img-responsive" style="max-height: 200px;">
                    </div>
                    <div class="col-md-6">
                        <h2 class="text-white"><?= $product_name; ?></h2>
                        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.</p> -->
                        <p class="mb-4 text-white"><?= $product_caption; ?></p>
                        <p><strong class="text-primary h4 amount"><?= $product_price; ?></strong></p>
                        <p class="text-white"><span class="text-warning">Category: </span><?= ucwords($product_category); ?></p>
                        <p class="text-white"><span class="text-warning">Price: </span><?= ucwords($product_size); ?></p>
                        <p class="text-white"><span class="text-warning">Discount: </span><?= ucwords($product_discount); ?>%</p>
                        <p>
                            <a href="<?php echo SITE_URL . '/admins/edit/?id=' . $product_id; ?>" class="buy-now btn btn-sm btn-primary">Edit <i class="fa-solid fa-file-pen"></i></a>

                            <?php if(strtolower($is_featured) == "no") : ?>
                            <a href="<?php echo SITE_URL . '/admins/feature_product/?id=' . $product_id; ?>" class="buy-now btn btn-sm btn-success text-white">Feature <i class="fa-solid fa-star"></i></a>
                            <?php else: ?>
                                <a href="<?php echo SITE_URL . '/admins/unfeature_product/?id=' . $product_id; ?>" class="buy-now btn btn-sm btn-warning text-white">Unfeature <i class="fa-solid fa-ban"></i></a>
                            <?php endif; ?>
                            <a href="<?php echo SITE_URL . '/admins/product_discount/?id=' . $product_id; ?>" class="buy-now btn btn-sm btn-info text-white">Discount <i class="fa-solid fa-tag"></i></a>
                            <a href="<?php echo SITE_URL . '/admins/delete_product/?id=' . $product_id; ?>" class="buy-now btn btn-sm btn-danger text-white">Delete <i class="fa-solid fa-trash"></i></a>
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>


<script src="<?php echo SITE_URL ?>/public/js/amount.js"></script>

<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>