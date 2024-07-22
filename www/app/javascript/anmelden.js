function anmelden() {

    var benutzername = document.getElementById("input-username").value;
    var passwort = document.getElementById("input-password").value;

    var user_login = benutzername + passwort;
    
    console.log(user_login);

    document.getElementById("signin-button").style.display = "none";
    document.getElementById("signin-button-load").style.display = "flex";

    $.ajax({
        type: "POST",
        url: "php/anmelden.php", // Hier den Pfad zu deinem PHP-Skript angeben
        data: { user_login: user_login },
        success: function(response) {

            console.log(response);
            
            if (response == 0) {

                setTimeout(function(){

                    document.getElementById("signin-button-error").style.display = "flex";
                    document.getElementById("signin-button-load").style.display = "none";

                }, 1000);

                setTimeout(function(){
                    document.getElementById("signin-button-error").style.display = "none";
                    document.getElementById("signin-button").style.display = "flex";
                }, 2500);

            }
            else {
                console.log(response);
                data = response.split("✩");              
                console.log(data);

                if (data[0] == "Admin") {
                    footerbarAdmin = true;
                }

                setCookie("login", user_login, 7);
                setCookie("rolle", data[0], 7);
                setCookie("anzeigename", data[1] + " " + data[2], 7);
                setCookie("benutzername", data[3], 7);
                setCookie("initialien", data[1][0] + data[2][0], 7);

                document.getElementById("signin-button-error").style.display = "flex";
                document.getElementById("signin-button-error").textContent = "Erfolg";
                document.getElementById("signin-button-load").style.display = "none";

                navigate("profil");


            }
        },
        error: function(error) {
            
            console.log(error);
        }
    });

}