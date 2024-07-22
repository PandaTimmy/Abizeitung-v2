<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost";
// $serverUsername = "hgu-abi-25";
// $serverPassword = "hgu-sql-bplaced";
$dbname = "hgu-abi-25_abizeitungDB";

$serverUsername = "root";
$serverPassword = "";

if (!function_exists("sqlCommand")) {

    function sqlCommand($sqlcommand) {
        global $servername, $serverUsername, $serverPassword, $dbname;
    
        $conn = new mysqli($servername, $serverUsername, $serverPassword, $dbname);
        $conn->set_charset("utf8mb4");
    
        if ($conn->connect_error) {
            die("Verbindung fehlgeschlagen: " . $conn->connect_error);
        }
        
        $result = $conn->query($sqlcommand);
    
        $conn->close();

        return $result;
    
    }
}

?>