<?php

  include_once 'classes/database.php';

  $db = new database();

  $q = "SELECT i.id as image_id, i.img_title, i.img_description, i.img_name, i.img_path
        FROM img_table AS i INNER JOIN images2article AS i2a ON i2a.image_id = i.id
        WHERE i2a.article_id = " . $db->escape($_GET['article_id']);

  $res = $db->query($q)->fetchAll();
?>
<div id="aiciVineRezultatulLaAjax">
    <table>
      <tr>
        <td>
          Nume
        </td>
        <td>
          Descriere
        </td>
        <td>
          Poza
        </td>
      </tr>
      <?php foreach($res as $image) { ?>
        <tr>
          <td>
            <?php echo $image['img_title']; ?>
          </td>
          <td>
            <?php echo $image['img_description']; ?>
          </td>
          <td>
            <img src="<?php echo $image['img_path'] . $image['img_name']; ?>" width="300" height="300" >
          </td>
          <td>
            <input class="jsImage" type="checkbox" name="image" value="<?php echo $image['image_id'];?>" image-id='<?php echo $image['image_id']; ?>' article-id='<?php echo $_GET['article_id'];?>' checked> Delete image from this article<br>
          </td>
        </tr>
        <?php } ?>
    </table>
</div>

  <html>
   <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
   </head>
   <body>
    <div class="container">
     <br />
     <h2 align="center">Search</h2><br />
     <div class="form-group">
      <div class="input-group">
       <span class="input-group-addon">Search</span>
       <input type="text" name="search_text" id="search_text" placeholder="Search by title" class="form-control" />
      </div>
     </div>
     <br />
     <div id="result"></div>
    </div>
   </body>
  </html>


  <script>
  $(document).ready(function(){
  	$("#search_text").keyup(function(e){
      var code = e.which; // recommended to use e.which, it's normalized across browsers
      if(code == 13) {

    		$.ajax({
    		type: "POST",
    		url: "image_sugestions.php",
    		data:'term='+$(this).val(),
    		success: function(data){
    			$("#result").html(data);
    		}
    		});
      }
  	});

    /*
    * ia toate elementele din pagina care au clasa jsImage
    */
    $('.jsImage').on("click", function(event) {
      var imageId = jQuery(event.currentTarget).attr('image-id');
      var articleId = jQuery(event.currentTarget).attr('article-id');
      var checked = jQuery(event.currentTarget).is(':checked');
      if(checked) {
        match({
              imageId: imageId,
              articleId: articleId
          });
      } else {
          unmatcha2i(imageId, articleId);
      }
    });
});

  function match(imageId, articleId) {
    $.ajax({
      type: "POST",
      url: "match_i2a.php",
      data: {
        imageId: imageId,
        articleId: articleId
      },
      success: function(data){

      }
    });
  }

  function unmatcha2i(imageId, articleId) {
    $.ajax({
      type: "POST",
      url: "unmatch_i2a.php",
      data: {
        imageId: imageId,
        articleId: articleId
      },
      success: function(data){

      }
    });
  }


  </script>
