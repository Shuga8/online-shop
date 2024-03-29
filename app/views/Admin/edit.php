<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>

<!-- content -->


<div class="content">

<?php 

extract($data['product']);

?>

<a class="btn btn-success px-2 m-3 text-white" href="<?= SITE_URL . "/admins/product/?id=" . $product_id; ?>">
    <i class="fa-solid fa-arrow-left"></i>
</a>

    <div class="form-container">
        <form action="<?php echo SITE_URL; ?>/admins/update" method="POST" enctype="multipart/form-data">
            <h3>
                <caption>Edit - "<?= strtolower($product_name) ?>"</caption>
            </h3>

            <p style="text-align: center;">
                <?php

                if (isset($_SESSION['error'])) {
                    echo $_SESSION['error'];
                    unset($_SESSION['error']);
                }

                ?>
            </p>
            <div class="input-field">
                <label for="product_name">Product name</label>
                <input type="hidden" name="product_id" value="<?= $product_id; ?>">
                <input type="text" name="product_name" id="product_name" value="<?= $product_name ?>">
            </div>

            <div class="input-field">
                <label for="product_cap">Product caption</label>
                <input type="text" name="product_cap" id="product_cap" value="<?= $product_caption ?>">
            </div>

            <br>

            <div class="input-field">

                <label for="product_img">Choose Image</label>

                <div class="image-preview">

                    <figure>

                        <img src="<?php echo SITE_URL; ?>/public/extras/<?= $product_image ?>" style="" alt="Product Image /" id="selected-image">

                    </figure>

                </div>

                <p id="image-name"></p>

                <input type="file" name="product_img" id="product_img">
            </div>

            <div class="input-field">
                <label for="product_price">Product price</label>
                <input type="text" name="product_price" id="product_price" value="<?= $product_price; ?>">
            </div>

            <div class="input-field">
                <label for="product_category">Product category</label>
                <select name="product_category" id="product_category">
                    <option value="men">Men</option>
                    <option value="women">Women</option>
                    <option value="unisex">Unisex</option>
                    <option value="children">Children</option>
                </select>
            </div>

            <div class="input-field">
                <label for="product_size">Product Size</label>
                <select name="product_size" id="product_size">
                    <option value="small">Small</option>
                    <option value="medium">Medium</option>
                    <option value="large">Large</option>
                    <option value="extra large">Extra Large</option>
                </select>
            </div>

            <div class="input-field">
                <label for="product_quantity">Quantity Available</label>
                <input type="number" name="product_quantity" id="product_quantity" value="<?= $product_quantity; ?>">
            </div>

            <button type="submit" id="submit" name="submit">Update <i class="fas fa-file-pen"></i></button>

        </form>
    </div>

</div>

<script src="<?php echo SITE_URL; ?>/public/js/add_products.js"></script>

<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>