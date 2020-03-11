<?php

include_once 'classes/database.php';

$db = new database();

$article_id = (isset($_POST['article_id']) ? $_POST['article_id'] : '');
$images = (isset($_POST['imagine']) ? $_POST['imagine'] : '');

if (is_array($images)) {
  foreach($images AS $image_id) {
    $sql = "INSERT INTO images2article (article_id, image_id)
             VALUES ('".$db->escape($article_id)."',
                     '".$db->escape($image_id)."')";
    $db->query($sql);
  }
}


?>
