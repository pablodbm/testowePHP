<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();
//bez sesji - postman
// $userId = $_SESSION["userId"];
//$userId = 2;
$transactionId = mysqli_real_escape_string($mysqli,$_GET["transactionId"]);
$deleteOutgoing = "DELETE FROM transactions WHERE id=$transactionId";
$mysqli->query($deleteOutgoing);
$response = array("response"=>"transactionDeleted");
echo json_encode($response);
?>