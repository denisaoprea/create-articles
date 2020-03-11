<?php

include_once 'classes/article.php';
include_once 'classes/database.php';

// echo "<pre>";
// var_dump($_GET);
// var_dump($_POST); die();

if (isset($_POST['article_title']))
{
$article = new article(
  $_POST['article_title'],
  $_POST['article_headline'],
  $_POST['article_body'],
  $_POST['publish_date'],
  $_POST['is_active']
);


$article->setDb(new database());
$article->save_article();

} else {

}

header('Location: http://localhost/OOP/get_article.php');

?>
