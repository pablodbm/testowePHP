<?php
header('Access-Control-Allow-Origin: *');
require "./db_connect.php";

$login = mysqli_real_escape_string($mysqli,$_GET["login"]);
$name = mysqli_real_escape_string($mysqli,$_GET["name"]);
$surname = mysqli_real_escape_string($mysqli,$_GET["surname"]);
$email = mysqli_real_escape_string($mysqli,$_GET["email"]);
$password = mysqli_real_escape_string($mysqli,$_GET["password"]);
if(strlen($login)!=0 && strlen($name)!=0 && strlen($surname)!=0 && strlen($email)!=0 && strlen($password)!=0){
$password = md5($password);

$validateEmail = "SELECT * FROM users WHERE email='$email'";
$validateLogin = "SELECT * FROM users WHERE login='$login'";


$validateEmailResult = $mysqli->query($validateEmail);
$validateLoginResult = $mysqli->query($validateLogin);

$response = array();
if($validateEmailResult->num_rows==0 && $validateLoginResult->num_rows==0 ){
    $addUserToDb = "INSERT INTO users (login,name,surname,email,password,userType) VALUES( '$login','$name','$surname','$email','$password','user')";
    $mysqli->query($addUserToDb);
    $response["response"] = "correctRegister";

    $getUserId = "SELECT id FROM users WHERE login='$login' && password='$password'";
    $userId = $mysqli->query($getUserId);
    $userId = $userId->fetch_assoc();

$createWallet = "INSERT INTO wallets (amount,userId,monthlyLimit) VALUES (0,".$userId["id"].",1000)";
$mysqli->query($createWallet);



}else{
    $response["response"] = "incorrectRegister";
}
echo json_encode($response);
}else{
    $response = array("response"=>"wrongData");
    echo json_encode($response);
}
