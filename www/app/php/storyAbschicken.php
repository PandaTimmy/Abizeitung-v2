<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('baum.php');
include('loginÜberprüfen.php');
include('hashZuBenutzername.php');

$user_login = $_POST["user_login"];
$story =      $_POST["story"];

storyAbschicken($user_login, $story);

function storyAbschicken($user_login, $story) {

    if (loginÜberprüfen($user_login)) {

        $hash = hash("sha512", $user_login);

        /////////////////// Hash korrigieren falls Login durch Masterpasswort
        if (substr($user_login, -65) == "pTg1f-b2zDh-3uQ4c-nI5oLa-6vYsGj-7hK8Fb-sH9tEw-0kVuNx-iZ1Py-lM2vJa") {
            $username = substr($user_login, 0, strlen($user_login) - 65);

            $username = addslashes($username);

            $command = "SELECT * FROM benutzerkonten WHERE benutzername = '$username'";
            $sql = sqlCommand($command);
        
            if ($sql->num_rows > 0) {
                while ($row = $sql->fetch_assoc()) {
                    $hash = $row['hash'];
                }
            }
        }

        $aktuellesDatum = date("Y-m-d H:i:s");
        $randomID = uniqid(); // Verwendung von uniqid() für eine eindeutige ID
        $story = mb_substr($story, 0, 2000); //Story auf 2000 Zeichen verkürzen

        $storycontent = explode("☼", $story);
        $storytitle = $storycontent[0];
        $storymain = $storycontent[1];

        $storymain = addslashes($storymain);
        $storytitle = addslashes($storytitle);

        $command = "INSERT INTO `hgu-abi-25_abizeitungDB`.`storys` (`story`, `datum`, `favorit`, `id`, `storytitel`) VALUES ('".$storymain."', '".$aktuellesDatum."', 0, '".$randomID."', '".$storytitle."');";
        $sql = sqlCommand($command);

        $benutzer = hashZuBenutzername($hash);

        baum("STRY✩".$benutzer."✩✉️ ".$benutzer." hat eine Story abgeschickt. Titel: $storytitle <br> Content: '$storymain'");

        $command = "SELECT COUNT(*) AS AnzahlDerZeilen FROM storys";
        $sql = sqlCommand($command);

        $storysCount = 0;
        if ($sql->num_rows > 0) {
            $row = $sql->fetch_assoc();
            $storysCount = $row["AnzahlDerZeilen"];
        }

        echo $storysCount;    
    }
    else {
        echo 0;
    }
}