<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "img";

$con = mysqli_connect($host, $user, $password, $dbname);

if(isset($_POST["imageId"]))
{

  $q = "INSERT INTO images2article (article_id, image_id) VALUES (image_id = '".$_POST["imageId"]."', article_id = '" . $_POST["articleId"] . "')";

  // var_dump($q);
  // die();

  mysqli_query($con, $q);

}

?>
