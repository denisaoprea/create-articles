<?php

$mysqli = new mysqli("localhost", "root", "", "img");

// Check connection
if($mysqli === false){
    die("ERROR: Could not connect. " . $mysqli->connect_error);
}

// Attempt select query execution
$sql = "SELECT * FROM articles";
if($result = $mysqli->query($sql)){
    if($result->num_rows > 0){
        echo "<table>";
            echo "<tr>";
                echo "<th>Id</th>";
                echo "<th>Title</th>";
                echo "<th>Headline</th>";
                echo "<th>Body</th>";
                echo "<th>Publish date</th>";
                echo "<th>Insert date</th>";
                echo "<th>Update date</th>";
                echo "<th>Is active</th>";
            echo "</tr>";
        while($row = $result->fetch_array()){
            echo "<tr>";
                echo "<td>" . $row['id'] . "</td>";
                echo "<td>" . $row['article_title'] . "</td>";
                echo "<td>" . $row['article_headline'] . "</td>";
                echo "<td>" . $row['article_body'] . "</td>";
                echo "<td>" . $row['publish_date'] . "</td>";
                echo "<td>" . $row['insert_date'] . "</td>";
                echo "<td>" . $row['update_date'] . "</td>";
                echo "<td>" . $row['is_active'] . "</td>";
                echo "<td><a href='edit.php?id=" . $row['id'] . "'>Edit</a></td>";
                echo "<td><a href='delete.php?id=" . $row['id'] . "'>Delete</a></td>";
            echo "</tr>";

        }
        echo "</table>";
        // Free result set
        $result->free();
    } else{
        echo "No records matching your query were found.";
    }
    } else{
    echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
}

// Close connection
$mysqli->close();
?>
