<?php
$dir_input = '../../input';
$dir_output = '../../output';

if ($_GET['type'] == 'input') {
  if (is_dir($dir_input)) {
    $files_input = scandir($dir_input);
    foreach ($files_input as $file) {
      if ($file != '.' && $file != '..') {
        unlink($dir_input . '/' . $file);
      }
    }
  }

  echo 'Input directory cleared.';
} else if ($_GET['type'] == 'output') {
  if (is_dir($dir_output)) {
    $files_output = scandir($dir_output);
    foreach ($files_output as $file) {
      if ($file != '.' && $file != '..') {
        unlink($dir_output . '/' . $file);
      }
    }
  }

  echo 'Output directory cleared.';
} else {
  echo 'Invalid type parameter.';
}
?>
