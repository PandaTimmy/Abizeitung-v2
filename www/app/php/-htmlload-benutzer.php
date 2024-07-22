<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('adminÜberprüfen.php');

$user_login =  $_POST["user_login"];

benutzerHTML($user_login);

function benutzerHTML($user_login) {

    if (adminÜberprüfen($user_login)) {


        echo '<div style="height: 40px;"></div>

        <h3>Alle Benutzer (71)</h3>
        
        <div style="height: 20px;"></div>
        
        <button class="button-icon">
            <div class="img icon">
                <div class="bg">
                    <div class="add"></div>
                </div>
            </div>

            <div class="text"><div>
                <h4>Benuterkonto hinzufügen</h4>
            </div></div>

            <div class="img-cta"><div class="link"></div></div>

        </button>';


        $command = "SELECT nachname, vorname, benutzername, hash, rechte, realpassunlocked FROM benutzerkonten ORDER BY vorname ASC";
        $sql = sqlCommand($command);
    
        if ($sql->num_rows > 0) {
            
    
            while ($row = $sql->fetch_assoc()) {

                if ($row["rechte"] == "1") {
                    echo '
                
                    <div class="button-icon" onclick="loadUserEdit(\''.$row["benutzername"].'\')">
                    <div class="img icon">
                        <div class="bg status">
                            <div class="nopfp"></div>
                        </div>
                        <div class="img-status"></div>
                    </div>

                    <div class="text"><div>
                        <h4>'.$row["vorname"].' '.$row["nachname"].'</h4>
                        <h5>Admin</h5>
                    </div></div>

                    <div class="img-cta"><div class="link" ></div></div>

                    </div>
                                        
                    ';
                } else {
                    echo '
                
                    <div class="button-icon" onclick="loadUserEdit(\''.$row["benutzername"].'\')">';

                    if( $row["realpassunlocked"] == 0) {
                        echo '
                        
                        <div class="img icon">
                            <div class="bg status">
                                <div class="nopfp"></div>
                            </div>
                            <div class="img-status statusDark"></div>
                        </div>
                        
                        ';
                    } else {
                        echo '
                        
                        <div class="img icon">
                            <div class="bg">
                                <div class="nopfp"></div>
                            </div>
                        </div>
                        
                        ';
                    }
                    

                    echo '

                    <div class="text"><div>
                        <h4>'.$row["vorname"].' '.$row["nachname"].'</h4>
                        <h5 >Schüler '; if($row["realpassunlocked"] == 0) { echo '| Gesperrt';}  echo '</h5>
                    </div></div>

                    <div class="img-cta" style="pointer-events: all"><div class="link" ></div></div>

                    </div>
                                        
                    ';
                }

                
    
                //echo "☾".$row["nachname"]."✩".$row["vorname"]."✩".$row["benutzername"]."✩".$row["hash"]."✩".$row["rechte"];
                
            }
        }

        echo '<div style="height: 20px;"></div>';
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