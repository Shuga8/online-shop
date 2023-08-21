<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>


<!-- content -->

<?php

extract($data['product']);

?>

<a class="btn btn-success px-2 m-3 text-white" href="<?= SITE_URL . '/admins/product/?id' . $product_id; ?>">
    <i class="fa-solid fa-arrow-left"></i>
</a>


<div class="content">

</div>


<script src="<?php echo SITE_URL ?>/public/js/amount.js"></script>

<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>