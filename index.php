<?php

  $msg = "";

if (isset($_POST['upload']))
{
  $target = 'images/'.basename($_FILES['image']['name']);

  $db = mysqli_connect("localhost", "root", "", "photos");

  $image = $_FILES['image']['name'];
  $text = $_POST['text'];

  $sql = "INSERT INTO images (image, text) VALUES ('$image', '$text')";

  mysqli_query($db, $sql);

  if (move_uploaded_file($_FILES['image']['tmp_name'], $target))
  {
    $msg = "Image uploaded successfully";
  }
  else {
    $msg = "There was a problem uploading the image";
  }
}
