<?php 
  include 'upload-img.php';
  include 'connection.php';
  
  function addCarousel($data) {
    global $conn;

    $title = stripslashes($data['title']);
    $description = stripslashes($data['description']);
    $image = upload();

    $query = "INSERT INTO carousel VALUES ('', '$image', '$title', '$description')";
    mysqli_query($conn, $query);

  }

?>  