<?php

header('Access-Control-Allow-Origin: *');
require "./db_connect.php";

$getAllCategories = "SELECT json FROM categories";
$allCategories = $mysqli->query($getAllCategories);
$allCategories = $allCategories->fetch_assoc();
echo json_encode($allCategories["json"]);

?>