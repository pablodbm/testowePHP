<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
$listAll = "SELECT * FROM transactions ORDER BY userId";
$data = $mysqli->query($listAll);
$data = $data->fetch_all(MYSQLI_ASSOC);
echo json_encode($data);