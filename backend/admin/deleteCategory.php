<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$categoryId = mysqli_real_escape_string($mysqli,$_GET["categoryId"]);

$deleteCategory = "DELETE FROM categories WHERE id=$categoryId";
$mysqli->query($deleteCategory);