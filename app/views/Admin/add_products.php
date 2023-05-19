<!-- Header -->
<?php

include_once APPROOT . "/views/includes/admin-header.php";

?>

<!-- content -->


<div class="content">


    <div class="form-container">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-field">
                <label for="product_name">Product name</label>
                <input type="text" name="product_name" id="product_name">
            </div>

            <div class="input-field">
                <label for="product_cap">Product caption</label>
                <input type="text" name="product_cap" id="product_cap">
            </div>

            <div class="input-field">

                <label for="product_img">Product Image</label>

                <div class="image-preview">

                    <img src="<?php echo SITE_URL; ?>/public/images/Noun_Project_cloud_upload_icon_411593_cc.png" style="max-width: 300px;height: 250px;" alt="Product Image /" id="selected-image">

                </div>

                <p id="image-name"></p>

                <input type="file" name="product_img" id="product_img">
            </div>

            <div class="input-field">
                <label for="product_price">Product price</label>
                <input type="number" name="product_price" id="product_price">
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


        </form>
    </div>


</div>


<script src="<?php echo SITE_URL; ?>/public/js/add_products.js"></script>


<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/admin-footer.php";

?>