<?php
  if(isset($_FILES['image_file'])) {
    $quality = $_POST['quality'];
    $source_image = $_FILES['image_file']['tmp_name'];
    $output_image = 'output/' . pathinfo($_FILES['image_file']['name'], PATHINFO_FILENAME) . '.webp';
    $info = getimagesize($source_image);

    if ($info['mime'] == 'image/jpeg') {
      $image = imagecreatefromjpeg($source_image);
    } elseif ($info['mime'] == 'image/png') {
      $image = imagecreatefrompng($source_image);
    } else {
      die('Unsupported image type.');
    }

    imagepalettetotruecolor($image);
    imagewebp($image, $output_image, $quality);
    imagedestroy($image);

    move_uploaded_file($source_image, 'input/' . $_FILES['image_file']['name']);
    
    echo $output_image;
  }
?>
