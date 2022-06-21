<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";

$userId = mysqli_real_escape_string($mysqli,$_GET["userId"]);
$getUserData = "SELECT id,login,name,surname,email,active,userType FROM users WHERE id=$userId";
$userData = $mysqli->query($getUserData);
$userData = $userData->fetch_assoc();
echo json_encode($userData);