<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($mysqli,$_GET["title"]);
$source = mysqli_real_escape_string($mysqli,$_GET["source"]);
$category = mysqli_real_escape_string($mysqli,$_GET["category"]);
// $type = mysqli_real_escape_string($mysqli,$_GET["type"]);
$amount = mysqli_real_escape_string($mysqli,$_GET["amount"]);
$date = mysqli_real_escape_string($mysqli,$_GET["date"]);
//$userId = 2;
$userId = $_SESSION["userId"];
$updateIncome = "UPDATE transactions SET title='$title',source='$source',category='$category',amount='$amount',date='$date' WHERE userId=$userId AND type='income'";
echo $updateIncome;
$mysqli->query($updateIncome);
$response = array("response"=>"incomeChanged");
echo json_encode($response);
?>