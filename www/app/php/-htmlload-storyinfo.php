<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('adminÜberprüfen.php');

$user_login = $_POST["user_login"];
$uuid       = $_POST["uuid"];

storybearbeitenHTML($user_login, $uuid);

function storybearbeitenHTML($user_login, $uuid) {

    if (adminÜberprüfen($user_login)) {

        $uuid = addslashes($uuid);

        $command = "SELECT * FROM storys WHERE id = '$uuid'";
        $sql = sqlCommand($command);
    
        if ($sql->num_rows > 0) {
            
            while ($row = $sql->fetch_assoc()) {

                $titel = $row["storytitel"];
                $main = $row["story"];
                $datum = $row["datum"];
                $favorit = $row["favorit"];
                $uuid = $row["id"];
            }
        }

        if ( $favorit == "1") {
            $favorit = "Ja";
            $checked = "checked";
            $newFavStat = 0;
        } else {
            $favorit = "Nein";
            $checked = "";
            $newFavStat = 1;
        }

        echo '
        <div style="height: 40px;"></div>
        
        <h3>Informationen</h3>
        
        <div class="info" style="padding: 1rem 12rem 12rem 12rem;">
        
        
        <div class="info" style="text-align: left;">
            <h3>Titel</h3>
            <h5 style="luser-select: all; -webkit-user-select: all;">'.$titel.'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Story</h3>
            <h5 style="luser-select: all; -webkit-user-select: all;">'.$main.'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Datum</h3>
            <h5 style="luser-select: all; -webkit-user-select: all;">'.$datum.'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Favorit</h3>
            <h5>'.$favorit.'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>UUID</h3>
            <h5 style="line-break: anywhere; user-select: all; -webkit-user-select: all; font-family: \'Courier New\', Courier, monospace;">'.$uuid.'</h5>
        </div>
        
        </div>
        
                
        <div style="height: 40px;"></div>

        <h3>Bearbeiten</h3>

        <div class="input-boolean">
            

            <h5>Favorit Status</h5>

            <div class="checkbox-wrapper-7">
                <input class="tgl tgl-ios" id="favBoolStory" type="checkbox" '.$checked.' onchange="storyFavStatus(\''.$uuid.'\', \''.$newFavStat.'\')">
                <label class="tgl-btn" for="favBoolStory">
            </div>


        </div>

        <button onclick="if (confirm(\'Möchtest du wirklich diese Story permanent löschen?\')) { storyLöschen(\''.$uuid.'\'); }" class="tertiary-button red">Story Löschen</button>



        <div style="height: 40px;"></div>

                
        ';
    

    }

    
}