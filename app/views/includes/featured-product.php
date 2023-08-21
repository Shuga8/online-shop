<?php if(count((array) $data['featured']) > 0) :  ?>
<div class="site-section block-3 site-blocks-2 bg-light">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-7 site-section-heading text-center pt-4">
        <h2>Featured Products</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="nonloop-block-3 owl-carousel">
          
        <?php foreach($data['featured'] as $featured) : ?>
            <div class="item">
              <div class="block-4 text-center">
                <figure class="block-4-image">
                  <img src="<?php echo SITE_URL; ?>/public/extras/<?= $featured->product_image; ?>" alt="Image placeholder" class="img-fluid" style="width:100%;max-height: 250px;aspect-ratio: 16 / 9;object-fit:auto;">
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="<?= SITE_URL . '/pages/single/' . $featured->product_id; ?>"><?= $featured->product_name; ?></a></h3>
                  <p class="mb-0"><?= $featured->product_caption; ?></p>
                  <p class="text-primary font-weight-bold amount"><?= $featured->product_price; ?></p>
                </div>
              </div>
            </div>
        <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif; ?>