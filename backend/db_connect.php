<?php
$user = "m26320_budjet";
$host = "mysql.ct8.pl";
$db_name = "m26320_budjet";
$pass = "!QAZ2wsx";

$mysqli = new mysqli($host,$user,$pass,$db_name);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
    exit();
} else {
}


?>


