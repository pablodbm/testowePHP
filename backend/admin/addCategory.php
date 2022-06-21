<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$newCategory = mysqli_real_escape_string($mysqli,$_GET["newCategory"]);

$addCategory = "INSERT INTO categories (name) VALUES ('$newCategory')";
$mysqli->query($addCategory);

?>