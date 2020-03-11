<!DOCTYPE html>
<body bgcolor="white">
<center>
<h3> ARTICLE UPLOADING </h3>
<hr>
<form action="save_article.php" method="post" enctype="multipart/form-data">

<label for="article_title">Article title:</label>
<textarea name = "article_title" cols = "40" rows = "2"></textarea>
<br />
<br />
<label for="article_headline">Article headline:</label>
<textarea name = "article_headline" cols = "40" rows = "3"></textarea>
<br />
<br />
<label for="article_body">Article body:</label>
<textarea name = "article_body" cols = "40" rows = "7"></textarea>
<br />
<br />
<label for="publish_date">Publish date:</label>
<textarea name = "publish_date" cols = "40" rows = "1"></textarea>
<br />
<br />
<p><b>Is active?</b></p>

  <input type="radio" name="is_active" value="1"> Yes<br>
  <input type="radio" name="is_active" value="0"> No<br>


<br />
<input type="submit" name="submit" value="Submit" />
