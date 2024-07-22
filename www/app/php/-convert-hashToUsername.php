<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');

function hashToUsername($hash) {

    $command = "SELECT * FROM benutzerkonten WHERE hash = '$hash'";
    $sql = sqlCommand($command);

    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
            $username = $row['hash'];
        }
    }

    return $username;

}

?>