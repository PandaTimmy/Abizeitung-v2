<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('baum.php');
include('adminÜberprüfen.php');
include('-convert-loginGetData.php');

$user_login = $_POST["user_login"];
$uuid =       $_POST["uuid"];
$action =     $_POST["action"];
$newstatus =  $_POST["newstatus"];


if (adminÜberprüfen($user_login)) {

    $user_data = loginGetData($user_login);

    if( $newstatus != 1) {
        $newstatus = 0;
    }

    $target = "none";

    if($action == "story")        { $target = "storys"; }
    else if($action == "beichte") { $target = "beichten"; }
    else if($action == "zitat")   { $target = "zitate"; }

    if( $target != "none") {

        $target = addslashes($target);
        $uuid = addslashes($uuid);

        $command = "UPDATE ".$target." SET favorit = ".$newstatus." WHERE id = '$uuid'";

        $sql = sqlCommand($command);


        if( $newstatus == 1) {

            if($action == "story")
            { 
                echo "Story favorisiert";
                baum("FAVS✩".$user_data["user_username"]."✩⭐️ ".$user_data["user_username"]." hat die Story ".$uuid." favorisiert.");
            }
            
            else if($action == "beichte")
            {
                echo "Beichte favorisiert";
                baum("FAVB✩".$user_data["user_username"]."✩⭐️ ".$user_data["user_username"]." hat die Beichte ".$uuid." favorisiert.");
            }
    
            else if($action == "zitat")
            {
                echo "Zitat favorisiert";
                baum("FAVZ✩".$user_data["user_username"]."✩⭐️ ".$user_data["user_username"]." hat das Zitat ".$uuid." favorisiert.");
            }

        } else {

            if($action == "story")
            { 
                echo "Story entfavorisiert";
                baum("FAVS✩".$user_data["user_username"]."✩❌ ".$user_data["user_username"]." hat die Story ".$uuid." entfavorisert.");
            }
            
            else if($action == "beichte")
            {
                echo "Beichte entfavorisiert";
                baum("FAVB✩".$user_data["user_username"]."✩❌ ".$user_data["user_username"]." hat die Beichte ".$uuid." entfavorisert.");
            }
    
            else if($action == "zitat")
            {
                echo "Zitat entfavorisiert";
                baum("FAVZ✩".$user_data["user_username"]."✩❌ ".$user_data["user_username"]." hat das Zitat ".$uuid." entfavorisert.");
            }
        }
        

    } else {
        echo "Ungültiges Ziel";
    }

}