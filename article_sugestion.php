<?php

$mysqli = new mysqli("localhost", "root", "", "img");
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

$articles = [];

if(isset($_REQUEST["term"])){
    // Prepare a select statement
    $sql = "SELECT * FROM articles WHERE article_title LIKE ?";

    if($stmt = $mysqli->prepare($sql)){

        // Set parameters
        $param_term = '%' . $_REQUEST["term"] . '%';

        // Bind variables to the prepared statement as parameters
        $stmt->bind_param("s", $param_term);



        // Attempt to execute the prepared statement
        if($stmt->execute()){
            $result = $stmt->get_result();

            // Check number of rows in the result set
            if($result->num_rows > 0){
                // Fetch result rows as an associative array
                while($row = $result->fetch_array(MYSQLI_ASSOC)){
                  $articles[] = $row;
                }
            } else{
                echo "<p>No matches found</p>";
            }
        } else{
            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
        }
    }

    // Close statement
    $stmt->close();
}

// Close connection
$mysqli->close();

if (count($articles) > 0) {
?>
  <ul>
      <?php foreach($articles AS $article) { ?>
        <li>

          <span><?php echo $article['article_title']; ?></span>
        </li>
      <?php } ?>
  </ul>
<?php } ?>
