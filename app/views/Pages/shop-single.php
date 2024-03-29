<!-- Header -->
<?php

include_once APPROOT . "/views/includes/header.php";

?>

<!-- content -->

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?= $data['product']->product_name; ?></strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <img src="<?= SITE_URL . '/public/extras/' . $data['product']->product_image ?>" alt="Image" class="img-fluid">
      </div>
      <div class="col-md-6">
        <h2 class="text-black"><?= $data['product']->product_name; ?></h2>
        <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur, vitae, explicabo? Incidunt facere, natus soluta dolores iusto! Molestiae expedita veritatis nesciunt doloremque sint asperiores fuga voluptas, distinctio, aperiam, ratione dolore.</p> -->
        <p class="mb-4"><?= $data['product']->product_caption; ?></p>
        <p><strong class="text-primary h4 amount"><?= $data['product']->product_price; ?></strong></p>
        <!-- <div class="mb-1 d-flex">
              <label for="option-sm" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-sm" name="shop-sizes"></span> <span class="d-inline-block text-black">Small</span>
              </label>
              <label for="option-md" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-md" name="shop-sizes"></span> <span class="d-inline-block text-black">Medium</span>
              </label>
              <label for="option-lg" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-lg" name="shop-sizes"></span> <span class="d-inline-block text-black">Large</span>
              </label>
              <label for="option-xl" class="d-flex mr-3 mb-3">
                <span class="d-inline-block mr-2" style="top:-2px; position: relative;"><input type="radio" id="option-xl" name="shop-sizes"></span> <span class="d-inline-block text-black"> Extra Large</span>
              </label>
            </div> -->
        <!-- <div class="mb-5">
          <div class="input-group mb-3" style="max-width: 120px;">
            <div class="input-group-prepend">
              <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
            </div>
            <input type="text" class="form-control text-center" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
            <div class="input-group-append">
              <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
            </div>
          </div>

        </div> -->
        <p class="mb-4"><span class="text-danger">Category: </span><?= ucwords($data['product']->product_category); ?></p>
        <p class="mb-4"><span class="text-danger">Size: </span><?= ucwords($data['product']->product_size); ?></p>
        <p><a href="<?php echo SITE_URL . '/pages/add_to_cart/' . $data['product']->id . '/' . $data['product']->product_id; ?>" class="buy-now btn btn-sm btn-primary">Add To Cart</a></p>

      </div>
    </div>
  </div>
</div>

<?php

include_once APPROOT . "/views/includes/featured-product.php";

?>

<script>
  let balances = document.querySelectorAll(".amount");

  balances.forEach(Oldbalance => {
    let balance = Oldbalance.textContent;

    balance = parseInt(balance);

    balance =
      balance == 0 || balance == null || typeof balance != "number" ? 0 : balance;

    balance = balance.toLocaleString("en-NG", {
      style: "currency",
      currency: "NGN",
    });

    Oldbalance.textContent = balance;
  });
</script>

<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/footer.php";

?>

</html>