<?php 
require_once "core/init.php";
if($user){
    header("Location: index.php");
}

$user = $db->real_escape_string($_POST["user_signup"]);
$pass = $_POST["pass_signup"];
$repass = $_POST["repass_signup"];

$show_alert = "<script>$('#formSignup .alert').removeClass('hidden');</script>";
$hide_alert = "<script>$('#formSignup .alert').addClass('hidden');</script>";
$success_alert = "<script>$('#formSignup .alert').attr('class', 'alert alert-success');</script>";


$check_user = "SELECT username FROM users WHERE username = '$user'";
$check_ok = true;

if(strlen($user) < 6 || strlen($user) > 24){
    echo $show_alert.'Le nom d\'utilisateur doit comporter entre 6 et 24 caractères.';
    $check_ok = false;
}

if (preg_match('/\W/', $user)){
    echo $show_alert.'Le nom d\'utilisateur ne peut pas contenir de caractères spéciaux ni d\'espaces.';
    $check_ok = false;
}

if ($db->num_rows($check_user)){
    echo $show_alert.'Le nom d\'utilisateur existe déjà, veuillez utiliser un autre nom.';
    $check_ok = false;
}

if (strlen($pass) < 6){
    echo $show_alert.'Le mot de passe est trop court, essayez avec un autre mot de passe plus sécurisé.';
    $check_ok = false;
}


if($check_ok){
    $pass_signup = md5($pass); // crypter mot de passe

    $db->insert("users",array(
        "username" => "{$user}",
        "password" => "{$pass_signup}",
        "date_signuped" => "{$date_current}"        
    ));
    //send data to session
    $session->send($user);
    $db->dis_connect();
     
    // show notification successful
    echo $show_alert.$success_alert." Enregistrement du compte réussi.
        <script>
            location.reload();
        </script>
    ";
}


?>