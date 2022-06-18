<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($mysqli,$_GET["title"]);
$source = mysqli_real_escape_string($mysqli,$_GET["source"]);
$category = mysqli_real_escape_string($mysqli,$_GET["category"]);
$amount = mysqli_real_escape_string($mysqli,$_GET["amount"]);
//z poziomu php dodajemy date wplywu oraz z sesji userid
$date = date('Y-m-d H:i:s');
$userId = $_SESSION["userId"];
//$userId = 2;
// $addIncome = "INSERT INTO incomes (title,source,category,type,amount,userId,date) VALUES ('$title','$source','$category','$type',$amount,$userId,'$date')";
$addIncome = "INSERT INTO transactions (title,source,category,amount,userId,date,type) VALUES ('$title','$source','$category',$amount,$userId,'$date','income')";
echo $addIncome;
$mysqli->query($addIncome);
$response = array("response"=>"incomeAdd");
echo json_encode($response);
?>