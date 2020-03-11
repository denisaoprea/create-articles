<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "img";

$con = mysqli_connect($host, $user, $password,$dbname);

$id = $_GET['id'];

if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "DELETE FROM articles WHERE id=".mysqli_real_escape_string($con, $id);

if(mysqli_query($con, $sql)){
    echo "Record was deleted successfully.";
}
else{
    echo "ERROR: Could not able to execute $sql. "
                                   . mysqli_error($con);
}
mysqli_close($con);
?>
