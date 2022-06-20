<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$newCategory = mysqli_real_escape_string($mysqli,$_GET["newCategory"]);

$getAllCategories = "SELECT json FROM categories";
$allCategories = $mysqli->query($getAllCategories);
$allCategories = $allCategories->fetch_assoc();
$allCategoriesArray = json_decode($allCategories["json"],true);
$categoryData = array("category"=>$newCategory,"categoryId"=>uniqid());
array_push($allCategoriesArray,$categoryData);
$updateCategories = "UPDATE categories SET json='".json_encode($allCategoriesArray)."'";
$mysqli->query($updateCategories);
$responseArray = array("response"=>"categoryAdded");
echo json_encode($responseArray);

?>