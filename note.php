<?php 
    require_once "core/init.php";

    if(!$user){
        header('Location: index.php');
    }

    if(isset($_POST["title"]) && isset($_POST["body"])){
        $title = $db->real_escape_string($_POST["title"]);
        $body = $db->real_escape_string($_POST["body"]);

        $title = htmlentities($title);
        $body = htmlentities($body);
    }

    if(isset($_POST["ac"])){
        switch($_POST["ac"]) {
            case "create":
                $db->insert("notes",array(
                    "user_id" => "{$data_user['id_user']}",
                    "title" => "{$title}",
                    "body" => "{$body}",
                    "date_created" => "{$date_current}"
                ));
                $db->dis_connect();
                echo "<script>location.href='index.php';</script>";
                break;
            case "edit":
                $id = $db->real_escape_string($_POST['id_note']);
                $db->update("notes",array(
                    "title" => "{$title}",
                    "body" => "{$body}"
                ),"id_note =".$id);
                echo "<script>location.href='index.php';</script>";
                $db->dis_connect();
                break;
            case "delete":
                $id = $db->real_escape_string($_POST['id']);
                $db->delete("notes","id_note = ".$id);
                $db->dis_connect();
                echo "<script>location.href='index.php';</script>";
                break;
            default : 
                echo "L'action n'est pas existe.";
        }
    }
?>