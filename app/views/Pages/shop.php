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
              <h2 class="text-black h5">Shop All</h2>
            </div>
            <div class="d-flex">
              <div class="dropdown mr-1 ml-md-auto">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  Latest
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                  <a class="dropdown-item" href="#">Men</a>
                  <a class="dropdown-item" href="#">Women</a>
                  <a class="dropdown-item" href="#">Unisex</a>
                  <a class="dropdown-item" href="#">Children</a>
                </div>
              </div>
              <div class="btn-group">
                <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                  <a class="dropdown-item" href="#">Relevance</a>
                  <a class="dropdown-item" href="#">Name, A to Z</a>
                  <a class="dropdown-item" href="#">Name, Z to A</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Price, low to high</a>
                  <a class="dropdown-item" href="#">Price, high to low</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <style>
          .item-container {}

          @media(max-width: 450px) {
            .item {
              margin: 0px auto !important;
            }
          }
        </style>
        <div class="row mb-5" id="clothes-container">

          <div class="item-container" style="inline-size: clamp(100%);display: flex;gap:2rem;flex-wrap: wrap;">

            <div class="item" style="inline-size: clamp(300px, 300px, 250px);block-size: 350px;background: #ddd;">

            </div>


          </div>

          <!-- <?php foreach ($data['products'] as $product) : ?>

            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <a href="<?= SITE_URL ?>"><img src="<?php echo SITE_URL;  ?>/public/extras/<?php echo $product->product_image; ?>" alt="Image placeholder" class="img-fluid"></a>
                <div class="block-4-text p-2">
                  <h3><a href="<?= SITE_URL ?>"><?php echo $product->product_name; ?></a></h3>
                  <p class="mb-0"><?php echo $product->product_caption; ?></p>
                  <p class="text-primary font-weight-bold product-amount">50</p>

                  <a href="" id="add-to-cart" class="mb-2 p-2 text-white bg-primary">ADD TO CART<span class="icon icon-shopping_cart"></span></a>

                  <div class="clear-fix"></div>
                  <br>
                </div>
              </div>
            </div>

          <?php endforeach; ?> -->

        </div>
        <!-- <div class="row" data-aos="fade-up">
          <div class="col-md-12 text-center">
            <div class="site-block-27">
              <ul>
                <li><a href="#">&lt;</a></li>
                <li class="active"><span>1</span></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">&gt;</a></li>
              </ul>
            </div>
          </div>
        </div> -->
      </div>

      <div class="col-md-3 order-1 mb-5 mb-md-0">
        <div class="border p-4 rounded mb-4">
          <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
          <ul class="list-unstyled mb-0">
            <li class="mb-1"><a href="#" class="d-flex"><span>Men</span> <span class="text-black ml-auto men-span-count">(...)</span></a></li>
            <li class="mb-1"><a href="#" class="d-flex"><span>Women</span> <span class="text-black ml-auto women-span-count">(...)</span></a></li>
            <li class="mb-1"><a href="#" class="d-flex"><span>Unisex</span> <span class="text-black ml-auto unisex-span-count">(...)</span></a></li>
            <li class="mb-1"><a href="#" class="d-flex"><span>Children</span> <span class="text-black ml-auto children-span-count">(...)</span></a></li>
          </ul>
        </div>

        <div class="border p-4 rounded mb-4">
          <!-- <div class="mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
            <div id="slider-range" class="border-primary"></div>
            <input type="text" name="text" id="amount" class="form-control border-0 pl-0 bg-white" disabled="" />
          </div> -->

          <div class="mb-4">
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
          </div>

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
<!-- Footer -->
<?php

include_once APPROOT . "/views/includes/footer.php";

?>

</html>