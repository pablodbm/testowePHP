<?php
header('Access-Control-Allow-Origin: *');
require "../db_connect.php";
session_start();
$userId = $_SESSION["userId"];
//$userId = 2;
// 1 - wszystkie dochody
// 2 - dochody malejaco po dacie
// 3 - dochody rosnaco po dacie
// 4 - dochody malejaco po kwocie
// 5 - dochody rosnaco po kwocie
// 6 - wszyskie wydatki
// 7 - wydatki malejaco po dacie
// 8 - wydatki rosnąco po dacie
// 9 - wydatki malejaco po kwocie
// 10 - wydatki rosnąco po kwocie

$filterType = $_GET["filterType"];
switch($filterType){
    case 1:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='income'";
        break;
    }
    case 2:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='income' ORDER BY date DESC";
        break;
    }
    case 3:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='income' ORDER BY date ASC";
        break;
    }
    case 4:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='income' ORDER BY amount DESC";
        break;
    }
    case 5:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='income' ORDER BY amount ASC";
        break;
    }
    case 6:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='outgoing'";
        break;
    }
    case 7:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='outgoing' ORDER BY date DESC";
        break;
    }
    case 8:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='outgoing' ORDER BY date ASC";
        break;
    }
    case 9:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='outgoing' ORDER BY amount DESC";
        break;
    }
    case 10:{
        $filterQuery = "SELECT * FROM transactions WHERE userId=$userId AND type='outgoing' ORDER BY amount ASC";
        break;
    }

}
$AllDataFromDb = $mysqli->query($filterQuery);
$responseData = $AllDataFromDb->fetch_all(MYSQLI_ASSOC);
echo json_encode($responseData);
