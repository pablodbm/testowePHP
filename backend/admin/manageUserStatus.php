<?php

header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

//skrypt dostaje id usera i nowy status

$userId = mysqli_real_escape_string($mysqli,$_GET["userId"]);
$userStatus = mysqli_real_escape_string($mysqli,$_GET["userStatus"]);
$updateUserStatus = "UPDATE users SET active=$userStatus WHERE id=$userId";
$mysqli->query($updateUserStatus);
$responseArray = array("response"=>"statusChanged");
echo json_encode($responseArray);
