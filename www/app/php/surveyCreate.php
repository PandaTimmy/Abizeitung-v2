<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('uuidv4.php');
include('adminÜberprüfen.php');

$user_login = $_POST["user_login"];

//Server Parameters
$survey_title       = $_POST["survey_title"];
$survey_description = $_POST["survey_description"];


if ( adminÜberprüfen( $user_login ) ) {
	
	$survey_UUID = uuidv4();
	
	$command = "INSERT INTO `hgu-abi-25_abizeitungDB`.`umfragen` (`titel`, `beschreibung`, `name`, `status`) VALUES ('".$titel."', '".$beschreibung."', '".$name."', 1);";
            $sql = sqlCommand($command);
}



?>