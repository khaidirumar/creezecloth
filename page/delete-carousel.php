<?php 

  $id = $_GET['id'];
  $carousel = query("SELECT * FROM carousel WHERE carouselId = '$id'");
  $gambarLama = './img/'.$carousel[0]['image'];

  $query = "DELETE FROM carousel WHERE carouselId = '$id'";
  $result = mysqli_query($conn, $query);

  if($result) {

    if(!unlink($gambarLama)) {
      echo '
        <script>
          alert("Tidak bisa menghapus gambar karena error");
        </script>
      ';
    } 
    
    echo '
      <script>
        alert("Carousel berhasil dihapus!");
        window.location = "index.php?menu=dashboard";
      </script>
    ';
  }

?>