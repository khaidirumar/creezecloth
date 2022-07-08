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
              <img src="" class="img-fluid" id="carouselImg" style="max-height: 80vh;" alt="">
            </div>
          </div>
          <form action="" method="POST" class="my-3 px-2">
            <p class="fs-5">Tambah Carousel Baru</p>
            <div class="row row-cols-1 g-3">
              <div class="col-12 col-md-8">
                <input type="file" class="form-control" id="image" name="image" onchange="previewImg(event)">
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
                <button type="submit" class="btn btn-primary">Tambah</button>
              </div>
            </div>
          </form>
        </div>
        <div class="tab-pane fade" id="product-tab-pane" role="tabpanel" aria-labelledby="product-tab" tabindex="0">
          ...
        </div>
      </div>
    </div>
  </div>
</div>

<script type='text/javascript'>
  function previewImg(event) {
    let close = document.getElementById('close');
    let reader = new FileReader();
    let output = document.getElementById('carouselImg');
    let input = document.getElementById('image');

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