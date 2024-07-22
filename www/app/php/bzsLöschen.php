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


if (adminÜberprüfen($user_login)) {

    $user_data = loginGetData($user_login);

    $target = "none";

    if($action == "story")        { $target = "storys"; }
    else if($action == "beichte") { $target = "beichten"; }
    else if($action == "zitat")   { $target = "zitate"; }

    if( $target != "none") {

        $target = addslashes($target);
        $uuid = addslashes($uuid);

        $command = "DELETE FROM ".$target." WHERE id = '$uuid'";
        $sql = sqlCommand($command);

        if($action == "story")
        { 
            echo "Story gelöscht";
            baum("DELS✩".$user_data["user_username"]."✩🗑️ ".$user_data["user_username"]." hat eine Story gelöscht / ".$uuid.".");
        }
        
        else if($action == "beichte")
        {
            echo "Beichte gelöscht";
            baum("DELB✩".$user_data["user_username"]."✩🗑️ ".$user_data["user_username"]." hat eine Beichte gelöscht / ".$uuid.".");
        }

        else if($action == "zitat")
        {
            echo "Zitat gelöscht";
            baum("DELZ✩".$user_data["user_username"]."✩🗑️ ".$user_data["user_username"]." hat ein Zitat gelöscht / ".$uuid.".");
        }

    } else {
        echo "Ungültiges Ziel";
    }

}