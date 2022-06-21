<?php
session_start();
session_destroy();
$responeArray = array("response"=>"userLogout");
echo json_encode($responeArray);

?>