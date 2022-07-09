<?php
$new = 1;
$products = query("SELECT * FROM products WHERE new = '$new' ORDER BY productId DESC LIMIT 4 ");

?>

<!-- New Products -->
<div class="container my-5">
  <h2>NEW PRODUCTS</h2>
  <div class="row row-cols-2 row-cols-md-3 row-cols-lg-4 my-2 g-3">

    <?php foreach ($products as $product) : ?>
      <div class="col">
        <div class="card">
          <img src="./img/<?= $product['image'] ?>" class="card-img-top img-fluid" style="max-height: 40vh; object-fit: cover;" alt="" />
          <a href="#!">
            <div class="mask">
              <?php if($product['new'] == 1) : ?>
                <div class="d-flex justify-content-start align-items-start h-100">
                  <p class="text-white bg-danger mb-0 mt-5 px-2 py-1">New</p>
                </div>
              <?php endif; ?>
            </div>
          </a>
          <div class="card-body">
            <h6 class="card-title"><?= $product['name'] ?></h6>
            <p>
              <?= $product['harga'] ?>
            </p>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
   
  </div>
</div>