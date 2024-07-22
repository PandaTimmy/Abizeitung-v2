function beichteFavStatus(uuid, newstatus) {

    var user_login = getCookie("login");

    $.ajax({
        type: "POST",
        url: "php/bzsFavorisieren.php", // Hier den Pfad zu deinem PHP-Skript angeben
        data: { user_login: user_login, uuid: uuid, newstatus: newstatus, action: "beichte" },
        success: function(response) {


            if (appStatus == "beichten-moderieren") {
                if (response.substring(0,6) == "<br />") {
                    document.getElementById("current-msc-ms").innerHTML = "<h5 style='word-wrap: break-word; overflow-wrap: break-word;'>"+response+"</h5>";
                    console.log(response);
    
                } else {
                    console.log(response);
                    contentload_beichtenmoderieren();
                }
            }

            if (appStatus == "beichte-info") {
                if (response.substring(0,6) == "<br />") {
                    document.getElementById("current-msc-ms").innerHTML = "<h5 style='word-wrap: break-word; overflow-wrap: break-word;'>"+response+"</h5>";
                    console.log(response);
    
                } else {
                    console.log(response);
                    htmlload_beichteinfo(uuid);
                }
            }
            

        },
        error: function(error) {
            
            console.log(error);
        }
    });
}