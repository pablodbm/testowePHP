<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$userId = $_SESSION["userId"];
//$userId = 2;

$amount = mysqli_real_escape_string($mysqli,$_GET["amount"]);
$walletName = mysqli_real_escape_string($mysqli,$_GET["walletName"]);
$monthlyLimit = mysqli_real_escape_string($mysqli,$_GET["monthlyLimit"]);

$createWallet = "INSERT INTO wallets (amount,walletName,userId,monthlyLimit) VALUES ($amount,'$walletName',$userId,$monthlyLimit)";
$mysqli->query($createWallet);
$responseArray = array("response"=>"walletCreated");
echo json_encode($responseArray);

?>