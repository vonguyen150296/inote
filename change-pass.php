<?php 
    require_once 'core/init.php';
 
    if (!$user){
        header('Location: index.php');
    }

    $old_pass = md5($_POST['old_pass']);
    $new_pass = $_POST['new_pass'];

    $show_alert = "<script>$('#formChangePass .alert').removeClass('hidden');</script>";
    $hide_alert = "<script>$('#formChangePass .alert').addClass('hidden');</script>";
    $success_alert = "<script>$('#formChangePass .alert').attr('class', 'alert alert-success');</script>";

    $check_ok = true;

    if ($old_pass != $data_user['password']){
        echo $old_pass."<br/>";
        echo $new_pass."<br/>";
        echo $show_alert.'L\'ancien mot de passe n\'est pas correct';
        $check_ok = false;
    }

    if (strlen($new_pass) < 6){
        echo $show_alert.'Le mot de passe est trop court, essayez avec un autre mot de passe plus sécurisé.';
        $check_ok = false;
    }

    if($check_ok){
        $new_pass = md5($new_pass);
        $db->update("users",array(
            "password"=>"{$new_pass}"
        ),"id_user = ".$data_user['id_user']);
        $db->dis_connect();
        echo "<script>location.href='index.php';</script>";
    }
?>