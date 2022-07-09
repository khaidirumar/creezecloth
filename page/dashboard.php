<?php
include './function/add-carousel.php';

if (isset($_POST['carousel'])) {

  if (addCarousel($_POST) > 0) {
    echo '
        <script>
          alert("Tidak berhasil menambahkan carousel");
        </script>
      ';
  } else {
    echo '
        <script>
          alert("Carousel berhasil ditambahkan!");
        </script>
      ';
  }
}

$carousels = query("SELECT * FROM carousel");
?>

<div class="container">
  <div class="card my-4">
    <div class="card-body">
      <p class="fs-4 card-title">Dashboard Administrator</p>
      <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="carousel-tab" data-bs-toggle="tab" data-bs-target="#carousel-tab-pane" type="button" role="tab" aria-controls="carousel-tab-pane" aria-selected="true">Carousel</button>
        </li>
        <li class="nav-item" role="presentation">
          <button class="nav-link" id="product-tab" data-bs-toggle="tab" data-bs-target="#product-tab-pane" type="button" role="tab" aria-controls="product-tab-pane" aria-selected="false">Product</button>
        </li>
      </ul>
      <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="carousel-tab-pane" role="tabpanel" aria-labelledby="carousel-tab" tabindex="0">
          <div class="col-12 my-3 position-relative">
            <button type="button" class="btn-close d-none" id="close" aria-label="Close"></button>
            <div class=" d-flex align-items-center justify-content-center">
              <img src="" class="img-fluid" id="productImg" style="max-height: 64vh;" alt="">
            </div>
          </div>
          <form action="" method="POST" class="my-3 px-2" enctype="multipart/form-data">
            <p class="fs-5">Tambah Carousel Baru</p>
            <div class="row row-cols-1 g-3">
              <div class="col-12 col-md-8">
                <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg(event)">
              </div>
              <div class="col-12 col-md-8">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="col-12 col-md-8">
                <label for="description" class="form-label">Description</label>
                <input type="text" class="form-control" id="description" name="description">
              </div>
              <div class="justify-content-start">
                <button type="submit" class="btn btn-primary" name="carousel">Tambah</button>
              </div>
            </div>
          </form>
          <p class="fs-4 mt-5">Carousel Tampil</p>
          <?php foreach ($carousels as $carousel) : ?>
            <div class="carousel mb-4">
              <div class="carousel-inner relative" style="max-height: 64vh">
                <div class="position-absolute" style="z-index: 1000;">
                  <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete-carousel">
                    <i class="bx bxs-trash"></i>
                  </button>
                  <a href="index.php?menu=edit-carousel&id=<?= $carousel['carouselId'] ?>">
                    <button class="btn btn-info">
                      <i class='bx bxs-edit'></i>
                    </button>
                  </a>
                </div>
                <div class="carousel-item active" style="max-height: 64vh">
                  <img src="./img/<?= $carousel['image']; ?>" class="d-block w-100" alt="..." />
                  <div class="carousel-caption d-none d-md-block">
                    <h5><?= $carousel['title']; ?></h5>
                    <p><?= $carousel['description']; ?></p>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
        <div class="tab-pane fade" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
          <div class="col-12 my-3 position-relative">
            <button type="button" class="btn-close d-none" id="close" aria-label="Close"></button>
            <div class=" d-flex align-items-center justify-content-center">
              <img src="" class="img-fluid" id="productImg" style="max-height: 50vh;" alt="">
            </div>
          </div>
          <form action="" method="POST" class="my-3 px-2">
            <p class="fs-5">Tambah Product</p>
            <div class="row row-cols-1 g-3">
              <div class="col-12 col-md-8">
                <input type="file" class="form-control" id="imageProduct" name="gambar" onchange="previewImg(event)">
              </div>
              <div class="col-12 col-md-8">
                <label for="title" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" id="title" name="title">
              </div>
              <div class="col-12 col-md-8">
                <label for="description" class="form-label">Harga Produk</label>
                <input type="text" class="form-control" id="description" name="description">
              </div>
              <div class="justify-content-start">
                <button type="submit" class="btn btn-primary" name="produk">Tambah</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="delete-carousel" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Hapus Carousel</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Ingin menghapus carousel ini?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
        <a href="index.php?menu=delete-carousel&id=<?= $carousel['carouselId'] ?>">
          <button type="button" class="btn btn-danger">Hapus</button>
        </a>
      </div>
    </div>
  </div>
</div>


<script type='text/javascript'>
  function previewImg(event) {
    let close = document.getElementById('close');
    let reader = new FileReader();
    let output = document.getElementById('productImg');
    let input = document.getElementById('gambar');

    reader.onload = function() {
      output.src = reader.result;
      close.classList.remove("d-none");
    }

    reader.readAsDataURL(event.target.files[0]);

    close.addEventListener('click', () => {
      close.classList.add("d-none");
      output.src = "";
      input.value = "";
    })
  }
</script>