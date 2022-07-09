<?php 
  
  include './function/upload-img.php';
  include './function/connection.php';

  $id = $_GET['id'];

  $carousel = query("SELECT * FROM carousel WHERE carouselId = '$id'");

  if(isset($_POST['edit-carousel'])) {
    
    $title = stripslashes($_POST['title']);
    $description = stripslashes($_POST['description']);
    
    if($_FILES['gambar']['name'] != null) {
      $gambar = upload();

    } else {
      $gambar = $carousel[0]['image'];

    }

    $query = "UPDATE carousel SET 
      title = '$title',
      description = '$description',
      image = '$gambar'
      WHERE carouselId = '$id'
    ";
    $result = mysqli_query($conn, $query);

    if($result) {
      echo '
        <script>
          alert("Carousel berhasil di-update");
          window.location = "index.php?menu=dashboard";
        </script>
      ';
    }

  }
?>

<div class="container">
  <div class="card my-4">
    <div class="card-body">
      <p class="fs-4 card-title">Dashboard Administrator</p>
      <div class="col-12 my-3 position-relative">
        <button type="button" class="btn-close d-none" id="close" aria-label="Close"></button>
        <div class=" d-flex align-items-center justify-content-center">
          <img src="./img/<?= $carousel[0]['image'] ?>" class="img-fluid" id="productImg" style="max-height: 64vh;" alt="">
        </div>
      </div>
      <form action="" method="POST" class="my-3 px-2" enctype="multipart/form-data">
        <p class="fs-5">Edit Carousel Baru</p>
        <div class="row row-cols-1 g-3">
          <div class="col-12 col-md-8">
            <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImg(event)">
          </div>
          <div class="col-12 col-md-8">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $carousel[0]['title'] ?>">
          </div>
          <div class="col-12 col-md-8">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" value="<?= $carousel[0]['description'] ?>">
          </div>
          <div class="justify-content-start">
            <button type="submit" class="btn btn-primary" name="edit-carousel">Simpan Perubahan</button>
          </div>
        </div>
      </form>
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