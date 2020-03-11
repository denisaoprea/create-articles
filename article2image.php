<?php

  $link = mysqli_connect("localhost", "root", "");
  mysqli_select_db($link, "img");
  $sql = "SELECT * FROM articles ORDER BY insert_date DESC";
  $result = mysqli_query($link, $sql);
  $articles = [];
  while($row = mysqli_fetch_assoc($result)) {
    $articles[] = $row;
  }
  mysqli_close($link);

?>

  <form method="post" action="images2articles.php">
    <table>
      <tr>
        <td>
          Title
        </td>
        <td>
          Headline
        </td>
        <td>
          Body
        </td>
      </tr>
      <?php foreach($articles as $article) { ?>
        <tr>
          <td>
            <?php echo $article['article_title']; ?>
          </td>
          <td>
            <?php echo $article['article_headline']; ?>
          </td>
          <td>
            <?php echo $article['article_body']; ?>
          </td>
        </tr>
        <?php } ?>
        <input type="hidden" name="article_id" value="<?php echo $_GET['article_id'];?>" />
  </form>
