<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');

function usernameGetData($userlogin, $username) {

    $command = "SELECT * FROM benutzerkonten WHERE benutzername = '$username'";
    $sql = sqlCommand($command);

    if ($sql->num_rows > 0) {
        while ($row = $sql->fetch_assoc()) {
            $hash = $row['hash'];
            $username = $row['benutzername'];
            $fname = $row['vorname'];
            $lname = $row['nachname'];
            $sex = $row['sex'];
            $rechte = $row['rechte'];
            $sbunlocked = $row['steckbriefFrei'];
            $defaultpass = $row['defaultpass'];
        }
    }

    $result = array(
        'user_hash' => $hash,
        'user_username' => $username,
        'user_fname' => $fname,
        'user_lname' => $lname,
        'user_sex' => $sex,
        'user_rechte' => $rechte,
        'user_sbunlocked' => $sbunlocked,
        'user_defaultpass' => $defaultpass
    );

    return $result;

}

?>