<?php
 
// Include database, session, general info
require_once 'core/init.php';
/************************HEADER***************************/
require_once 'includes/header.php';
 
/*************************BODY**************************/
if($user){
    if(isset($_GET["ac"])){ //ac = action
        $ac = addslashes(trim(htmlentities($_GET['ac'])));

        switch($ac) {
            case "create_note":
                require_once 'templates/create-note-form.php';
                break;
            case "edit_note":
                if (isset($_GET['id'])){
                    $get_id = addslashes(trim(htmlentities($_GET['id'])));
                    if ($get_id != ''){
                        // check note
                        $sql_check_id_exist = "SELECT id_note, user_id FROM notes WHERE user_id = '$data_user[id_user]' AND id_note = '$get_id'";
        
                        // si le note est existe
                        if ($db->num_rows($sql_check_id_exist)){
                            require_once 'templates/edit-note-form.php';
                        }else{
                            echo '
                                <div class="container">
                                    <div class="alert alert-danger">
                                        Le note n\'est pas existe!.
                                    </div>
                                </div>
                            ';
                        }                   
                    }else{
                        header('Location: index.php');
                    }               
                }else{
                    header('Location: index.php');
                }
                break;
            case "change_password":
                require_once 'templates/change-pass-form.php';
                break;
        }

    }else{
        // Include template list note
        require_once 'templates/list-note.php';
    }

}else{
    require_once "templates/signin-up-form.php";
}


 
/**************************FOOTER ***********************/
require_once 'includes/footer.php';
 
?>