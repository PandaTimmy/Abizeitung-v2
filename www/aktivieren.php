<?php
// Pfad der aktuellen Webseite abrufen
$current_path = $_SERVER['REQUEST_URI'];


// Gewünschter Pfad (in diesem Beispiel "/deine-datei.php/")
$desired_path = "/aktivieren.php/";



// Überprüfen, ob der aktuelle Pfad den gewünschten Pfad enthält
if (strpos($current_path, $desired_path) !== false) {
    // Extrahiere den Token aus dem Pfad
    $token = substr($current_path, strlen($desired_path));

    $last_slash_position = strrpos($token, "/");

    $result = substr($token, $last_slash_position + 1);

    setcookie("token", $result, time() + 300, "/"); // Gültig für 30 Tage

    // Jetzt kannst du den Token verwenden
    echo "Token: " . $result . "<br><hr>";



    header("Location: ../aktivieren");
    //exit; // Stelle sicher, dass das Skript hier beendet wird, um eine weitere Ausführung zu verhindern


    // Füge hier den Code hinzu, der mit dem Token arbeiten soll
} else {
    // Wenn der Pfad nicht übereinstimmt, führe hier die Standardaktion aus
    echo "Ungültiger Pfad";
    // Hier kannst du den Code einfügen, der ausgeführt werden soll, wenn der Pfad nicht übereinstimmt
}
?>
