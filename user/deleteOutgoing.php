<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();
//bez sesji - postman
$userId = $_SESSION["userId"];
//$userId = 2;
$outgoingId = mysqli_real_escape_string($mysqli,$_GET["outgoingId"]);
$deleteOutgoing = "DELETE FROM transactions WHERE id=$outgoingId AND userId = $userId AND type='outgoing'";
$mysqli->query($deleteOutgoing);
$response = array("response"=>"outgoingDeleted");
echo json_encode($response);

?>