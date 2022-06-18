<?php
header('Access-Control-Allow-Origin: *');

session_start();
$userId = $_SESSION["userID"];
require "../db_connect.php";


$getAllTransaction = "SELECT * FROM transactions WHERE userId=$userId ORDER BY date ASC";

$allTransactions = $mysqli->query($getAllTransaction);

$allTransactions = $allTransactions->fetch_all(MYSQLI_ASSOC);

echo json_encode($allTransactions);

?>