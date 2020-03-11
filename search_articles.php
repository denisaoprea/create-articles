!<!DOCTYPE html>
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
  		url: "article_sugestion.php",
  		data:'term='+$(this).val(),
  		success: function(data){
  			$("#result").html(data);
  		}
  		});
    }
	});
});

  </script>
