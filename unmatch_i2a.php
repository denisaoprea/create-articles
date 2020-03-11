<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "img";

$con = mysqli_connect($host, $user, $password, $dbname);

if(isset($_POST["imageId"]))
{

  $query = "DELETE FROM images2article WHERE image_id = '".$_POST["imageId"]."' AND article_id = '" . $_POST["articleId"] . "'";

  mysqli_query($con, $query);

}

?>
