<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>


<!-- content -->

<?php

extract($data['product']);

?>

<a class="btn btn-success px-2 m-3 text-white" href="<?= SITE_URL . '/admins/product/?id=' . $product_id; ?>">
    <i class="fa-solid fa-arrow-left"></i>
</a>


<div class="content">

        <form action="<?= SITE_URL; ?>/admins/add_discount_to_product" method="POST" enctype="application/x-www-form-urlencoded" style="width: 100%; height: 300px;display: flex;justify-content:center;align-items: center;flex-direction: column;"> 
            <input type="hidden" value="<?= $product_id; ?>" name="id" class="form-control form-control-lg">

            <div class="form-group">
                <label for="discount" class="form-label text-white">Discount:</label>
                <select name="discount" id="discount" class="form-control form-control-md">
                    <option value="0" selected>0%</option>
                    <option value="10">10%</option>
                    <option value="20">20%</option>
                    <option value="30">30%</option>
                    <option value="40">40%</option>
                    <option value="50">50%</option>
                    <option value="60">60%</option>
                    <option value="70">70%</option>
                    <option value="80">80%</option>
                    <option value="90">90%</option>
                    <option value="100">100%</option>
                </select>
            </div>

            <button type="submit" class="btn btn-warning text-white">Apply <i class="fa-solid fa-tag"></i></button>
        </form>


</div>


<script src="<?php echo SITE_URL ?>/public/js/amount.js"></script>

<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>