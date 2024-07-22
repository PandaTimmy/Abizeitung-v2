function htmlload_benutzer() {

    var user_login = getCookie("login");

    $.ajax({
        type: "POST",
        url: "php/-htmlload-benutzer.php", // Hier den Pfad zu deinem PHP-Skript angeben
        data: { user_login: user_login },
        success: function(response) {


            if (appStatus == "benutzer") {
                if (response.substring(0,6) == "<br />") {
                    document.getElementById("current-msc-ms").innerHTML = "<h5 style='word-wrap: break-word; overflow-wrap: break-word;'>"+response+"</h5>";
                    console.log(response);
    
                } else {
                    document.getElementById("current-msc-ms").innerHTML = response;
    
    
                }
                
            }
            

        },
        error: function(error) {
            
            console.log(error);
        }
    });

}