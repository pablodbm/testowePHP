<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$newCategory = mysqli_real_escape_string($mysqli,$_GET["newCategory"]);

$getAllCategories = "SELECT json FROM categories";
$allCategories = $mysqli->query($getAllCategories);
$allCategories = $allCategories->fetch_assoc();
$allCategoriesArray = json_decode($allCategories["json"],true);
array_push($allCategoriesArray,$newCategory);
$updateCategories = "UPDATE categories SET json='".json_encode($allCategoriesArray)."'";
$mysqli->query($updateCategories);
$responseArray = array("response"=>"categoryAdded");
echo json_encode($responseArray);

?>