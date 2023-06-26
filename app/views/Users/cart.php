<!-- Header -->
<?php

include_once APPROOT . "/views/includes/header.php";

?>

<!-- content -->

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo SITE_URL; ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
    </div>
  </div>
</div>
<div class="cart-container">
  <div class="cart-field">
    <div class="head">
      Your Cart(<?= $data['count']; ?>)
    </div>

    <?php foreach ($data['cart'] as $cart) : ?>
      <div class="cart-item">

        <img src="<?php echo SITE_URL; ?>/public/extras/<?php echo $cart->product_image; ?>" alt="<?php echo $cart->id; ?> /">

        <div class="details">
          <h3><?php echo $cart->product_name; ?></h3>
          <p><span>Size: </span><?php echo $cart->product_size; ?></p>
          <p><span>Quantity: </span><?php echo $cart->product_quantity; ?></p>


          <div class="actions">
            <a href="<?= SITE_URL; ?>/pages/delete/<?= $cart->id; ?>"></a>
            <a href=""></a>
          </div>
        </div>

        <p class="price"><i class="amount"><?php echo $cart->product_total; ?></i></p>

      </div>

    <?php endforeach; ?>

  </div>
  <div class="cart-summary">
    <h3>Summary</h3>

    <?php

    $sub = 0;
    $total = 0;

    foreach ($data['cart'] as $cart) {
      foreach ($cart as $key => $value) {
        if ($key == 'product_total') {
          $sub += $value;
          $total += $value;
        }
      }
    }

    $total += 3200;
    ?>

    <div class="details">
      <div class="flex-div">
        <h5>Subtotal</h5>
        <p class="amount"><?= $sub ?></p>
      </div>

      <div class="flex-div">
        <h5>Estimated Shipping Charges, Arrival 3days</h5>
        <p class="amount">3000</p>
      </div>

      <div class="flex-div">
        <h5 class="tax">Tax</h5>
        <p class="amount">200</p>
      </div>

      <div class="total">
        <h5>Total</h5>
        <p class="amount total"><?= $total ?></p>
      </div>

    </div>

    <form action="" method="POST">
      <input type="hidden" name="total_price" value="13200">
      <button type="submit" id="checkout-btn">Proceed to Checkout</button>
    </form>
  </div>
</div>

<!--  content ends here -->

<!-- Js -->
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