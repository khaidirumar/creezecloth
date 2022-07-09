<?php 

  $id = $_GET['id'];

  $query = "DELETE FROM carousel WHERE carouselId = '$id'";
  $result = mysqli_query($conn, $query);

  if($result) {
    echo '
      <script>
        alert("Carousel berhasil dihapus!");
        window.location = "index.php?menu=dashboard";
      </script>
    ';
  }

?>