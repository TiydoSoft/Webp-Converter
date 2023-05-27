<?php
  if(isset($_FILES['image_file'])) {
    $quality = $_POST['quality'];

    // Loop through all uploaded files
    foreach ($_FILES['image_file']['tmp_name'] as $key => $source_image) {
      $output_image = '../../output/' . pathinfo($_FILES['image_file']['name'][$key], PATHINFO_FILENAME) . '.webp';
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

      move_uploaded_file($source_image, '../../input/' . $_FILES['image_file']['name'][$key]);
      
      echo "<div class='output-image'><img src='".$output_image ."'><a class='download-btn' href='".$output_image."' download>Download</a></div>";
    }
  }
?>
