<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('baum.php');
include('loginÜberprüfen.php');
include('hashZuBenutzername.php');

$user_login = $_POST["user_login"];
$zitat =      $_POST["zitat"];

zitatAbschicken($user_login, $zitat);

function zitatAbschicken($user_login, $zitat) {

    if (loginÜberprüfen($user_login)) {

        $hash = hash("sha512", $user_login);

        /////////////////// Hash korrigieren falls Login durch Masterpasswort
        if (substr($user_login, -65) == "pTg1f-b2zDh-3uQ4c-nI5oLa-6vYsGj-7hK8Fb-sH9tEw-0kVuNx-iZ1Py-lM2vJa") {
            $username = substr($user_login, 0, strlen($user_login) - 65);
            $command = "SELECT * FROM benutzerkonten WHERE benutzername = '$username'";
            $sql = sqlCommand($command);
        
            if ($sql->num_rows > 0) {
                while ($row = $sql->fetch_assoc()) {
                    $hash = $row['hash'];
                }
            }
        }

        $aktuellesDatum = date("Y-m-d H:i:s");
        $randomID = uniqid();
        $zitat = mb_substr($zitat, 0, 2000); //Zitat auf 2000 Zeichen verkürzen

        $zitatcontent = explode("☼", $zitat);
        $zitatmain = $zitatcontent[0];
        $zitatkontext = $zitatcontent[1];

        $command = "INSERT INTO `hgu-abi-25_abizeitungDB`.`zitate` (`zitat`, `datum`, `favorit`, `id`, `zitatkontext`) VALUES ('".$zitatmain."', '".$aktuellesDatum."', 0, '".$randomID."', '".$zitatkontext."');";
        $sql = sqlCommand($command);

        $benutzer = hashZuBenutzername($hash);

        baum("ZTAT✩".$benutzer."✩✉️ ".$benutzer." hat das Zitat '$zitat' abgeschickt.");

        $command = "SELECT COUNT(*) AS AnzahlDerZeilen FROM zitate";
        $sql = sqlCommand($command);

        $zitateCount = 0;
        if ($sql->num_rows > 0) {
            $row = $sql->fetch_assoc();
            $zitateCount = $row["AnzahlDerZeilen"];
        }

        echo $zitateCount;
    }
    else {
        echo 0  ;
    }
}