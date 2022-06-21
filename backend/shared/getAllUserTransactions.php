<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
$userId = mysqli_real_escape_string($mysqli,$_GET["userId"]);

$getUsersTransactions = "SELECT * FROM transactions WHERE userId=$userId";
$data = $mysqli->query($getUsersTransactions);
$data = $data->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);