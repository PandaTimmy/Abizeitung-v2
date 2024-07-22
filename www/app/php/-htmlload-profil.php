<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('sql.php');
include('baum.php');
include('adminÜberprüfen.php');
include('loginÜberprüfen.php');
include('-convert-loginGetData.php');

$user_login = $_POST["user_login"];

if (loginÜberprüfen($user_login)) {

    $user_data = loginGetData($user_login);



echo '<h1>';
echo $user_data["user_fname"];
echo '</h1>

<h5 class="title-subtitle-centered" style="margin-top: 5rem;">';
echo $user_data["user_username"];
echo '</h5>

<div style="height: 50px;"></div>

<h3>Quick Links</h3>

<button class="button-link secondary" onclick="navigate(\'zitate\')">
    <div class="text">
        <div class="title">💬 Zitate</div>
    </div>
    <div class="img"></div>
</button>
<button class="button-link secondary" onclick="navigate(\'storys\')">
    <div class="text">
        <div class="title">📝 Storys</div>
    </div>
    <div class="img"></div>
</button>
';

if(adminÜberprüfen($user_login)) {
    echo '
    
    <button class="button-link primary" onclick="navigate(\'moderation\')">
    <div class="text">
        <div class="title">🔒 Moderation</div>
    </div>
    <div class="img"></div>
</button>

';
}

echo '

<div style="height: 50px;"></div>

<h3>Kontoeinstellungen</h3>

<button class="primary-button" onclick="navigate(\'passwort-aendern\')">Passwort ändern</button>
<button class="secondary-button" onclick="ausloggen()">Abmelden</button>

<div style="height: 50px;"></div>

';

// <h3>Experimentell</h3>
// <button class="button-link secondary" onclick="">
//     <div class="text">
//         <div class="title">Crush Count</div>
//         <div class="subtitle">Eroberer der Herzen</div>
//     </div>
//     <div class="img"></div>
// </button>

echo '
<div style="height: 40px;"></div>

';












}

?>