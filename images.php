<!DOCTYPE html>
<body bgcolor="white">
<center>
<h3> FILE UPLOADING </h3>
<hr>
<form action="save_images.php" method="post" enctype="multipart/form-data">

<label for="file">Filename:</label>
<input type="file" name="file" id="file" />
<br />
<br />
<label for="img_description">Description:</label>
<br />
<textarea name = "img_description" cols = "40" rows = "4"></textarea>
<br />
<br />
<label for="img_title">Image name:</label>
<textarea name = "img_title" cols = "40" rows = "1"></textarea>


<input type="submit" name="submit" value="Submit" />
