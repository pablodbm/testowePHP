<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();

$title = mysqli_real_escape_string($mysqli,$_GET["title"]);
$source = mysqli_real_escape_string($mysqli,$_GET["source"]);
$category = mysqli_real_escape_string($mysqli,$_GET["category"]);
// $type = mysqli_real_escape_string($mysqli,$_GET["type"]);
$amount = mysqli_real_escape_string($mysqli,$_GET["amount"]);
//z poziomu php dodajemy date wplywu oraz z sesji userid
$date = date('Y-m-d H:i:s');
 $userId = $_SESSION["userId"];
//$userId = 2;

//sprawdzenia przekroczenia limitu
$month = date("m");
$getTransactionsFromThisMonth = "SELECT SUM(amount) as total FROM `transactions` WHERE MONTH(date) = $month AND userId=$userId AND type='outgoing'";
$transactions = $mysqli->query($getTransactionsFromThisMonth);
$transactionsAssoc = $transactions->fetch_assoc();
$totalMontlyAmount = $transactionsAssoc["total"];

//pobranie limitu portfela
$getUserLimit = "SELECT monthlyLimit FROM wallets WHERE userId=$userId";
$limitResponse = $mysqli->query($getUserLimit);
$userLimit = $limitResponse->fetch_assoc();
$limit = $userLimit["monthlyLimit"];

if($totalMontlyAmount+$amount<=$limit){
    // $addoutgoing = "INSERT INTO outgoings (title,source,category,type,amount,userId,date) VALUES ('$title','$source','$category','$type',$amount,$userId,'$date')";
$addoutgoing = "INSERT INTO transactions (title,source,category,amount,userId,date,type) VALUES ('$title','$source','$category',$amount,$userId,'$date','outgoing')";
$mysqli->query($addoutgoing);
$response = array("response"=>"outgoingAdd");
echo json_encode($response);
}else{
    $response = array("response"=>"monthlyLimit");
    echo json_encode($response);

}

?>