<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($mysqli,$_GET["title"]);
$source = mysqli_real_escape_string($mysqli,$_GET["source"]);
$category = mysqli_real_escape_string($mysqli,$_GET["category"]);
$amount = mysqli_real_escape_string($mysqli,$_GET["amount"]);

//Dwa dodatkowe do naprawy błędu
$date = mysqli_real_escape_string($mysqli,$_GET["date"]);
$userId = mysqli_real_escape_string($mysqli,$_GET["userId"]);
// $userId = $_SESSION["userId"];
//z poziomu php dodajemy date wplywu oraz z sesji userid
// TEST -> $date = date('Y-m-d H:i:s');
// TEST -> $userId = $_SESSION["userId"];
//$userId = 2;
// $addIncome = "INSERT INTO incomes (title,source,category,type,amount,userId,date) VALUES ('$title','$source','$category','$type',$amount,$userId,'$date')";
$addIncome = "INSERT INTO transactions (title,source,category,amount,userId,date,type) VALUES ('$title','$source','$category',$amount,$userId,'$date','income')";
$updateWallet = "UPDATE wallets SET amount=amount+$amount WHERE userId=$userId";
$mysqli->query($updateWallet);
$mysqli->query($addIncome);
$response = array("response"=>"incomeAdd");
echo json_encode($response);
?>