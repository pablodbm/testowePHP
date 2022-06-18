<?php
header('Access-Control-Allow-Origin: *');
require "./db_connect.php";

$login = mysqli_real_escape_string($mysqli,$_GET["login"]);
$password = mysqli_real_escape_string($mysqli,$_GET["password"]);

if(strlen($login)!=0 && strlen($password)!=0){
$password = md5($password);

$checkCorrectLogin = "SELECT login,name,surname,email,active,birthday,id FROM users WHERE password='$password' AND login='$login'";
$loginResult = $mysqli->query($checkCorrectLogin);

$response = array();
if($loginResult->num_rows==0){
    //nie udalo sie zalogowac
    $response["response"] = "incorrectLogin";
}else{
    //udalo sie zalogowac
    $responseData = $loginResult->fetch_assoc();
    $_SESSION["userLogged"] = true;
    $_SESSION["userId"] = $responseData["userId"];
    $response["response"] = $responseData;

}
echo json_encode($response);
}else{
    $response = array("response"=>"wrongData");
    echo json_encode($response);
}
?>