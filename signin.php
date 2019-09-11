<?php 

require_once "core/init.php";
if($user){
    header("Location: index.php");
}

$username = $db->real_escape_string($_POST["user"]);
$pass = md5($_POST["pass"]);

$show_alert = "<script>$('#formSignin .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignin .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignin .alert').attr('class', 'alert alert-success');</script>";
 
$check_user = "SELECT username,password FROM users WHERE username = '$username'";

if($db->num_rows($check_user)){
    $data = $db->fetch_assoc($check_user,1);
    if($data["password"] == $pass && $data["username"] == $username){
        $session->send($username);
        $db->dis_connect();
        echo "<script>location.reload();</script>";
    }else{
        echo $show_alert.'L\'utilisateur ou le mot de passe n\'est pas correct';
    }
}else{
    echo $show_alert.'L\'utilisateur ou le mot de passe n\'est pas correct';
}

?>