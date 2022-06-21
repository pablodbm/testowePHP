<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";


$categoryId = mysqli_real_escape_string($mysqli,$_GET["categoryId"]);
$name = mysqli_real_escape_string($mysqli,$_GET["name"]);

$updateCategory = "UPDATE categories SET name='$name' WHERE id=$categoryId";
