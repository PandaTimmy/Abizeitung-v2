<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('adminÜberprüfen.php');

$user_login = $_POST["user_login"];

contentloadZitateModerieren($user_login);

function contentloadZitateModerieren($user_login) {

    if (adminÜberprüfen($user_login)) {

        $command = "SELECT zitatkontext, zitat, datum, favorit, id FROM zitate ORDER BY datum DESC";
        $sql = sqlCommand($command);
    
        if ($sql->num_rows > 0) {
            
            while ($row = $sql->fetch_assoc()) {

                if ( $row["favorit"] == 1) {
                    $klasse = "Fav";
                    $top = "⭐️ · ".$row["datum"];
                    $newStatFav = 0;
                    $favText = "💫&ensp;Entfavorisieren";
                } else {
                    $klasse = "keinFav";
                    $top = $row["datum"];
                    $newStatFav = 1;
                    $favText = "⭐️&ensp;Favorisieren";
                }


                echo '
                
                <div class="story-kachel '.$klasse.'">
                    <label class="top">
                        <div class="label-scale">

                            <h5>'.$top.'</h5>
                            
                            <div class="img"></div>

                            <div class="select">
                                <select id="select'.$row["id"].'" onchange="if(document.getElementById(\'select'.$row["id"].'\').value == \'delete\') { if (confirm(\'Möchtest du wirklich dieses Zitat permanent löschen?\')) { zitatLöschen(\''.$row["id"].'\'); } } if(document.getElementById(\'select'.$row["id"].'\').value == \'info\') { loadZitatInfo(\''.$row["id"].'\'); } if(document.getElementById(\'select'.$row["id"].'\').value == \'fav\') { zitatFavStatus(\''.$row["id"].'\', \''.$newStatFav.'\'); }">
                                    <option value="alle" selected disabled hidden>Optionen</option>
                                        <option value="fav">'.$favText.'</option>
                                        <option value="info">ℹ️&ensp;Info</option>
                                        <option value="delete">🗑️&ensp;Löschen</option>
                                </select>
                            </div>
                        </div>
                    </label>

                    <div class="title">
                        <h3>„'.$row["zitat"].'“</h3>
                    </div>

                    <div class="main">
                        <h4>'.$row["zitatkontext"].'</h4>
                    </div>
                </div>
                
                ';


            }
        }

    } else {
        echo '
        
        <div style="height: 40px;"></div>

        <h1>403</h1>

        <div style="height: 40px;"></div>

        <div class="info">
            <h3>Zugriff abgelehnt</h3>
            <h5>Sie haben keine Berechtigung, auf diese Seite zuzugreifen</h5>
        </div>

        <div style="height: 40px;"></div>

        <button class="secondary-button" onclick="navigate(\'anmelden\')">Zurück</button>
        ';
    }
}