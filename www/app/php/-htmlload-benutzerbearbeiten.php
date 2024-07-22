<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('adminÜberprüfen.php');
include('-convert-loginGetData.php');
include('-convert-usernameGetData.php');

$user_login = $_POST["user_login"];
$usertoload = $_POST["usertoload"];

benutzerbearbeitenHTML($user_login, $usertoload);

function benutzerbearbeitenHTML($user_login, $usertoload) {

    if (adminÜberprüfen($user_login)) {

        $usertoload_data = usernameGetData($user_login, $usertoload);

        if ($usertoload_data["user_rechte"] == "1")
        {
            $checked = "checked";
            $usertoload_data["user_rechte"] = "Admin";
        }

        else
        {
            $checked = "";
            $usertoload_data["user_rechte"] = "Schüler";
        }

        if ($usertoload_data["user_sex"] == "m") { $usertoload_data["user_sex"] = "Männlich"; }
        
        else { $usertoload_data["user_sex"] = "Weiblich"; }


        echo '
        <div style="height: 40px;"></div>
        
        <h1 style="text-align: left;">'.$usertoload_data["user_fname"].'</h1>
        
        <div style="height: 40px;"></div>
        
        <h3>Informationen</h3>
        
        <div class="info" style="padding: 1rem 12rem 12rem 12rem;">
        
        
        <div class="info" style="text-align: left;">
            <h3>Benutzername</h3>
            <h5>'.$usertoload_data["user_username"].'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Vorname</h3>
            <h5>'.$usertoload_data["user_fname"].'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Nachname</h3>
            <h5>'.$usertoload_data["user_lname"].'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Geschlecht</h3>
            <h5>'.$usertoload_data["user_sex"].'</h5>
        </div>
        
        <div class="info" style="text-align: left;">
            <h3>Rolle</h3>
            <h5>'.$usertoload_data["user_rechte"].'</h5>
        </div>';
        
        // <div class="info" style="text-align: left;">
        //     <h3>Default Passwort</h3>
        //     <h5 style="line-break: anywhere; user-select: all; -webkit-user-select: all; font-family: \'Courier New\', Courier, monospace;">12e1t3wt</h5>
        // </div>
        
        echo '
        <div class="info" style="text-align: left;">
            <h3>Hash</h3>
            <h5 style="line-break: anywhere; user-select: all; -webkit-user-select: all; font-family: \'Courier New\', Courier, monospace;">'.$usertoload_data["user_hash"].'</h5>
        </div>
        
        </div>';

        echo '
        
        
        <div style="height: 40px;"></div>
        
        <h3>Passwort</h3>

        <div class="info" style="padding: 12rem 12rem 12rem 12rem; text-align: left;">
        
        <h5 style="padding: 9rem;">Das voreingestellte Passwort benötigt man für die erste Anmeldung.<br><br>Wenn man sein neues Passwort vergisst, wird ein neues voreingestelltes Passwort eingerichtet.</h5>

            <div class="info" style="text-align: left;">
                <h3>Voreingestelltes Passwort</h3>
                <h5 style="line-break: anywhere; user-select: all; -webkit-user-select: all; font-family: \'Courier New\', Courier, monospace;">'.$usertoload_data["user_defaultpass"].'</h5>
            </div>
        </div>

        </div>

        ';

        echo '<div style="height: 40px;"></div>
        
        
        
        

        <h3>Bearbeiten</h3>

        <div class="input-boolean">
            

            <h5>Admin Status</h5>

            <div class="checkbox-wrapper-7">
                <input class="tgl tgl-ios" id="favBoolStory" type="checkbox" '.$checked.' onchange="">
                <label class="tgl-btn" for="favBoolStory">
            </div>


        </div>

        <button onclick="if (confirm(\'Möchtest du wirklich diese Beichte permanent löschen?\')) { beichteLöschen(\''.$uuid.'\'); }" class="tertiary-button red">Passwort Zurücksetzen</button>


        <div style="height: 40px;"></div>


        ';

    }

    
}