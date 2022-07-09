<?php 
  include 'upload-img.php';
  include 'connection.php';
  
  function addCarousel($data) {
    global $conn;

    $title = stripslashes($data['title']);
    $description = stripslashes($data['description']);
    $image = upload();

    if($image == false) {
      echo '
        <script>
          alert("Tidak berhasil menambahkan carousel karena error!");
        </script>
      ';
    } else {
      $query = "INSERT INTO carousel VALUES ('', '$image', '$title', '$description')";
      mysqli_query($conn, $query);

      echo '
        <script>
          alert("Carousel berhasil ditambahkan!");
        </script>
      ';
    }

   
  }

?>  