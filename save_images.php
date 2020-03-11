<?php

include_once 'classes/image.php';
include_once 'classes/database.php';

if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
  $path = "C:\\xampp\htdocs\OOP\\";

  $year_folder = $path . date("Y");
  $month_folder = $year_folder . '/' . date("m");
  $day_folder = $month_folder.'/'.date("d");

  $images = 'images'.'/'.date("Y").'/'.date("m").'/'.date("d").'/';

  //If the directory doesn't already exists.
  if(!is_dir($images)){
      //Create our directory.
      mkdir($images, 755, true);
  }

  $tmp = explode(".", $_FILES["file"]["name"]);
  $extension = end($tmp);
  $shaFilename = sha1(microtime());
  $fullFilename = $shaFilename . "." . $extension;

  move_uploaded_file(
    $_FILES['file']['tmp_name'],
    $path.$images.$fullFilename
  );

  $image = new Image($fullFilename, $images, $_POST['img_title'], $_POST['img_description']);
  $image->setDb(new database());
  $image->save();
} else {

}
?>
