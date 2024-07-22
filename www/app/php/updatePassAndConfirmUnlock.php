<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('baum.php');


function isValidURICharacters($string) {
    $allowed_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789 .,~!§$/()=ß?#+*-_@:<>^°';
    
    // Überprüfen, ob alle Zeichen in der Zeichenfolge zulässig sind
    // Die Funktion strspn() gibt die Länge des Anfangssegmentes der Zeichenfolge zurück, das nur aus den angegebenen Zeichen besteht.
    // Wenn die Länge der zurückgegebenen Zeichenfolge gleich der Länge der Eingabezeichenfolge ist, enthält die Zeichenfolge nur erlaubte Zeichen.
    return strspn($string, $allowed_chars) === strlen($string);
}


$token = addslashes($_POST["token"]);
$newpass = addslashes($_POST["newpass"]);

$command = "SELECT * FROM benutzerkonten WHERE hash = '$token' AND realpassunlocked = '0'";
$sql = sqlCommand($command);

if ($sql->num_rows > 0) {
    if (isValidURICharacters($newpass)) {
        if (strlen($newpass) > 5) {


            while ($row = $sql->fetch_assoc()) {
                $username = $row["benutzername"];
            }

            echo "true✩";

            echo $username;

            echo "✩";

            echo $_POST["newpass"];

            $newLogin = $username.$newpass;
            $newHash = hash("sha512", $newLogin);

            $command = "UPDATE benutzerkonten SET realpassunlocked = 1 WHERE benutzername = '$username'";
            $sql = sqlCommand($command);

            $command = "UPDATE benutzerkonten SET hash = '$newHash' WHERE benutzername = '$username'";
            $sql = sqlCommand($command);

            baum()
        } else {
            echo "false✩Dein Passwort muss mindestens 6 Zeichen lang sein.";
        }


    } else {
        echo "false✩Dein Passwort darf nur die Zeichen a-z, A-Z und .,~!§$/()=ß?#+*-_@:<>^° enthalten";
    }
}
else {
    echo "false✩Fehler";

}



?>