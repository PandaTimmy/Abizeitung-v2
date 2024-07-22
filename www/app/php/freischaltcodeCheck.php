<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');

$token = addslashes($_POST["token"]);

$command = "SELECT * FROM benutzerkonten WHERE hash = '$token' AND realpassunlocked = '0'";
$sql = sqlCommand($command);

if ($sql->num_rows > 0) {
    echo "true✩";

    while ($row = $sql->fetch_assoc()) {
        echo $row["vorname"];
    }

}
else {
    echo "false";

}


?>