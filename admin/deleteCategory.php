<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$deleteCategory = mysqli_real_escape_string($mysqli,$_GET["deleteCategory"]);

$getAllCategories = "SELECT json FROM categories";
$allCategories = $mysqli->query($getAllCategories);
$allCategories = $allCategories->fetch_assoc();
$allCategoriesArray = json_decode($allCategories["json"],true);

$newCategories = array();
foreach($allCategoriesArray as $single){
    if($single!=$deleteCategory){
        array_push($newCategories,$single); 
    } 
}
$updateCategories = "UPDATE categories SET json='".json_encode($newCategories)."'";
$mysqli->query($updateCategories);
$responseArray = array("response"=>"categoryDeleted");
echo json_encode($responseArray);
