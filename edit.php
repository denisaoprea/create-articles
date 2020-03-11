<?php

  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "img";

  $con = mysqli_connect($host, $user, $password,$dbname);

  // Check connection
  if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
  }

  if(isset($_POST['update']))
  {
      $id = $_POST['id'];
      $article_title = $_POST['article_title'];
      $article_headline = $_POST['article_headline'];
      $article_body = $_POST['article_body'];

      // checking empty fields
      if(empty($article_title) || empty($article_headline) || empty($article_body)) {

          if(empty($article_title)) {
              echo "<font color='red'>Title field is empty.</font><br/>";
          }

          if(empty($article_headline)) {
              echo "<font color='red'>Headline field is empty.</font><br/>";
          }

          if(empty($article_body)) {
              echo "<font color='red'>Body field is empty.</font><br/>";
          }

      } else {

            //updating the table
            $result = mysqli_query($con, "UPDATE articles SET
              article_title='".mysqli_real_escape_string($con, $article_title)."',
              article_headline='".mysqli_real_escape_string($con, $article_headline)."',
              article_body='".mysqli_real_escape_string($con, $article_body)."',
              update_date = '".mysqli_real_escape_string($con, date("Y-m-d h:i:s"))."'
              WHERE id='".mysqli_real_escape_string($con, $id)."'");
          }
      }
  ?>
  <?php
  //getting id from url
  $id = $_GET['id'];

  //selecting data associated with this particular id
  $result = mysqli_query($con, "SELECT * FROM articles WHERE id=".mysqli_real_escape_string($con, $id));

  while($res = mysqli_fetch_assoc($result))
  {
      $article_title = $res['article_title'];
      $article_headline = $res['article_headline'];
      $article_body = $res['article_body'];
  }
  ?>
  <html>
  <head>
      <title>Edit Data</title>
  </head>
  <body>
      <form name="form1" method="post" action="edit.php?id=<?php echo $id;?>" enctype="multipart/form-data">
          <table border="0">
              <tr>
                  <td>Title</td>
                  <td><input type="text" name="article_title" value="<?php echo $article_title;?>"></td>
              </tr>
              <tr>
                  <td>Headline</td>
                  <td><input type="text" name="article_headline" value="<?php echo $article_headline;?>"></td>
              </tr>
              <tr>
                  <td>Body</td>
                  <td><input type="text" name="article_body" value="<?php echo $article_body;?>"></td>
              </tr>
              <tr>
                  <td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
                  <td><input type="submit" name="update" value="Update"></td>
              </tr>
          </table>
      </form>
      <a href="edit_article_images.php?article_id=<?php echo $_GET['id'];?>">Article Images</a>
  </body>
  </html>
