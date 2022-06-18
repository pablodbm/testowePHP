<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
$id = mysqli_real_escape_string($mysqli,$_GET["id"]);
$title = mysqli_real_escape_string($mysqli,$_GET["title"]);
$source = mysqli_real_escape_string($mysqli,$_GET["source"]);
$category = mysqli_real_escape_string($mysqli,$_GET["category"]);
$amount = mysqli_real_escape_string($mysqli,$_GET["amount"]);
$userId = mysqli_real_escape_string($mysqli,$_GET["userId"]);
$date = mysqli_real_escape_string($mysqli,$_GET["date"]);
$type = mysqli_real_escape_string($mysqli,$_GET["type"]);

$updateSingle = "UPDATE transactions SET title='$title',source='$source',category='$category',amount=$amount,userId=$userId,date='$date',type='$type' WHERE id=$id";
$mysqli->query($updateSingle);
$response = array("response"=>"updated");
echo json_encode($response);



?>