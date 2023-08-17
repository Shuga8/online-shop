<!-- Header -->
<?php

include_once APPROOT . "/views/includes/header.php";

?>



<!-- content -->

<div class="bg-light py-3">
  <div class="container">
    <div class="row">
      <div class="col-md-12 mb-0"><a href="<?php echo SITE_URL;  ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">

    <div class="row mb-5">
      <div class="col-md-9 order-2">

        <div class="row">
          <div class="col-md-12 mb-5">
            <div class="float-md-left mb-4">
              <h2 class="text-black h5"><?= $data['h_title'] ?></h2>
            </div>
            <div class="d-flex">
              <div class="dropdown mr-1 ml-md-auto">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Latest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                  <a class="dropdown-item" href="<?php echo SITE_URL; ?>/pages/shop/category/men">Men</a>
                  <a class="dropdown-item" href="<?php echo SITE_URL; ?>/pages/shop/category/women">Women</a>
                  <a class="dropdown-item" href="<?php echo SITE_URL; ?>/pages/shop/category/unisex">Unisex</a>
                  <a class="dropdown-item" href="<?php echo SITE_URL; ?>/pages/shop/category/children">Children</a>
                </div>
              </div>
              <!-- <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                  <a class="dropdown-item" href="#">Relevance</a>
                  <a class="dropdown-item" href="#">Name, A to Z</a>
                  <a class="dropdown-item" href="#">Name, Z to A</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Price, low to high</a>
                  <a class="dropdown-item" href="#">Price, high to low</a>
                </div>
              </div> -->
            </div>
          </div>
        </div>

        <style>
          * {
            transition: .3s ease-in-out;
          }

          .item-container {
            inline-size: 100%;
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            gap: 2rem;
          }

          .item-container .item {
            block-size: 350px;
            box-shadow: 5px 5px 7px #ccc, 0px 2px 7px #ccc;
            border-radius: 7px;
            display: block;
          }

          .item .image {
            inline-size: 100%;
            block-size: 55%;
            overflow: hidden;
            border-radius: 7px 7px 0px 0px;
          }

          .item .image img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 7px 7px 0px 0px;
            background: #fff;
            backdrop-filter: hue(255, 255, 255);
          }

          .item .image img:hover {
            border-radius: 7px 7px 0px 0px;
            transform: scale(1.2);
          }

          .item .details .name {
            text-align: center;
            font-weight: 700;
            font-size: 1.1rem;
            text-transform: capitalize;
            margin-block-start: 3px !important;
          }

          .item .details .name i {
            font-size: .7rem !important;
          }

          .item .details .caption {
            margin-block-start: -15px;
            text-align: center;
            font-size: .85rem;
          }

          .item .details .amount {
            text-align: center;
            color: #111;
            font-size: 1.15rem;
            font-weight: 650;
            margin-bottom: 10px;
          }

          .item .details .last {
            text-align: center;
            margin-top: 5px;
          }

          .item .details .last a {
            padding: .5rem;
            background-color: #766EEA;
            color: #fff;
            border-radius: 3px;
          }

          .item .details .last a:hover {
            background-color: #766EEAaf;
          }

          /* Media query */

          @media screen and (min-width: 650px) and (max-width: 915px) {

            .item-container {
              inline-size: 100%;
              display: grid;
              grid-template-columns: 1fr 1fr;
              gap: 2rem;
            }

          }

          @media(max-width: 650px) {
            .item-container {
              display: flex;
              flex-wrap: wrap;
            }

            .item {
              margin-inline: auto !important;
              inline-size: 80%;
              block-size: 450px !important;
            }

            .item .image {
              block-size: 65%;
            }
          }
        </style>
        <div class="row mb-5" id="clothes-container">
        

        <?php if($data['message'] != "No products found"): ?>

          <div class="item-container">

            <?php foreach ($data['products'] as $product) : ?>

              <div class="item">

                <div class="image">

                  <a href="<?php echo SITE_URL; ?>/pages/single/<?php echo $product->product_id; ?>">
                    <img src="<?php echo SITE_URL; ?>/public/extras/<?php echo $product->product_image; ?>" alt="Product ID">
                  </a>
                </div>

                <div class="details">

                  <p class="name"><a href="<?php echo SITE_URL; ?>/pages/single/<?php echo $product->product_id; ?>"><?php echo $product->product_name; ?> <i class="fa-solid fa-arrow-up-right-from-square"></i></a></p>

                  <div class="caption"><?php echo $product->product_caption; ?></div>

                  <div class="amount">
                    <?php echo $product->product_price; ?>
                  </div>

                  <div class="last">

                    <a href="<?php echo SITE_URL . '/pages/add_to_cart/' . $product->id . '/' . $product->product_id; ?>">ADD <i class="fas fa-cart-plus"></i></a>

                  </div>

                </div>
              </div>



            <?php endforeach; ?>


          </div>


          <div class="page-counter-container">
            <strong>Page <?php echo $data['page'] . " of " . $data['total_num_of_pages']; ?></strong>

            <ul class="pagination">

              <li <?php if ($data['page']  <= 1) {
                    echo "class = 'disabled'";
                  } ?>>
                <a <?php if ($data['page']  > 1) {
                      echo "href='" . SITE_URL . "/pages/shop/?page=" . $data['previous'] . "'";
                    } ?>>Previous</a>

              </li>
              <?php

              if ($data['total_num_of_pages'] < ($data['total_num_of_pages'] + 1)) {
                for ($counter = 1; $counter <= $data['total_num_of_pages']; $counter++) {
                  $className = ($counter == $data['page']) ? "active" : "";
                  echo "<li class='$className'><a href='" . SITE_URL . "/pages/shop/?page=$counter'>$counter</a></li>";
                }
              }

              ?>

              <li>
                <?php if ($data['page'] >= $data['total_num_of_pages']) : ?>
                  <a>Next</a>
                <?php else : ?>
                  <a href="<?php echo SITE_URL; ?>/pages/shop/?page=<?php echo $data['next']; ?>">Next</a>
                <?php endif; ?>
              </li>
          </div>

        <?php else : ?>
          <div class="container my-5 text-center text-danger">
            No products to shop from !!!
          </div>
        <?php endif; ?>

        </div>

        

      </div>

      <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
          <ul class="list-unstyled mb-0">
            <li class="mb-1"><a href="<?php echo SITE_URL; ?>/pages/shop/category/men" class="d-flex"><span>Men</span> <span class="text-black ml-auto men-span-count">(...)</span></a></li>
            <li class="mb-1"><a href="<?php echo SITE_URL; ?>/pages/shop/category/women" class="d-flex"><span>Women</span> <span class="text-black ml-auto women-span-count">(...)</span></a></li>
            <li class="mb-1"><a href="<?php echo SITE_URL; ?>/pages/shop/category/unisex" class="d-flex"><span>Unisex</span> <span class="text-black ml-auto unisex-span-count">(...)</span></a></li>
            <li class="mb-1"><a href="<?php echo SITE_URL; ?>/pages/shop/category/children" class="d-flex"><span>Children</span> <span class="text-black ml-auto children-span-count">(...)</span></a></li>
          </ul>
        </div>

        <div class="border p-4 rounded mb-4">
          <!-- <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div> -->

          <!-- <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Size</h3>
            <label for="s_sm" class="d-flex">
              <input type="radio" id="s_sm" class="mr-2 mt-1" name="size"> <span class="text-black small-span-count">Small (...)</span>
            </label>
            <label for="s_md" class="d-flex">
              <input type="radio" id="s_md" class="mr-2 mt-1" name="size"> <span class="text-black medium-span-count">Medium (...)</span>
            </label>
            <label for="s_lg" class="d-flex">
              <input type="radio" id="s_lg" class="mr-2 mt-1" name="size"> <span class="text-black large-span-count">Large (...)</span>
            </label>

            <label for="s_xlg" class="d-flex">
              <input type="radio" id="s_xlg" class="mr-2 mt-1" name="size"> <span class="text-black xtra-large-span-count">Xtra Large (...)</span>
            </label>
          </div> -->

          <!-- <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Color</h3>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-danger color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Red (2,429)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-success color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Green (2,298)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-info color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Blue (1,075)</span>
            </a>
            <a href="#" class="d-flex color-item align-items-center">
              <span class="bg-primary color d-inline-block rounded-circle mr-2"></span> <span class="text-black">Purple (1,075)</span>
            </a>
          </div> -->

        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="site-section site-blocks-2">
          <div class="row justify-content-center text-center mb-5">
            <div class="col-md-7 site-section-heading pt-4">
              <h2>Categories</h2>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
              <a class="block-2-item" href="#">
                <figure class="image">
                  <img src="<?php echo SITE_URL;  ?>/public/images/women.jpg" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Collections</span>
                  <h3>Women</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
              <a class="block-2-item" href="#">
                <figure class="image">
                  <img src="<?php echo SITE_URL;  ?>/public/images/children.jpg" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Collections</span>
                  <h3>Children</h3>
                </div>
              </a>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
              <a class="block-2-item" href="#">
                <figure class="image">
                  <img src="<?php echo SITE_URL;  ?>/public/images/men.jpg" alt="" class="img-fluid">
                </figure>
                <div class="text">
                  <span class="text-uppercase">Collections</span>
                  <h3>Men</h3>
                </div>
              </a>
            </div>
          </div>

        </div>
      </div>
    </div>



  </div>
</div>

<!--  content ends here -->

<!-- Js -->
<script src="<?= SITE_URL . '/public/js/getProducts.js' ?>" type="module"></script>
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