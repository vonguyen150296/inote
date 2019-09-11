<?php 
class Session
{
    //send data
    public function send($user){
        $_SESSION["user"] = $user;
    }

    //start session
    public function start(){
        session_start();
    }

    //get data
    public function get(){
        if(isset($_SESSION["user"])){
            $user = $_SESSION["user"];
        }else{
            $user = "";
        }
        return $user;
    }

    //destroy session
    public function destroy(){
        session_destroy();
    }
}
?>