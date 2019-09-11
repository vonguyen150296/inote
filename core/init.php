<?php 
//include the library
require_once "classes/DB.php";
require_once "classes/Session.php";

// to declare object DB 
$db = new DB();
$db->connect();

// to declare object Session
$session = new Session();
// Bắt đầu session
$session->start();

$user = $session->get();
// $user = false;

//set timezone
date_default_timezone_set('Europe/Paris'); 
$date_current = '';
$date_current = date("Y-m-d H:i:s");
 
//get data user
if ($user){ 
    $sql_get_data_user = "SELECT * FROM users WHERE username = '$user'";
    $data_user = $db->fetch_assoc($sql_get_data_user, 1);
}

?>