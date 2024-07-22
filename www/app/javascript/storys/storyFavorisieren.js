function storyFavStatus(uuid, newstatus) {

    var user_login = getCookie("login");

    $.ajax({
        type: "POST",
        url: "php/bzsFavorisieren.php", // Hier den Pfad zu deinem PHP-Skript angeben
        data: { user_login: user_login, uuid: uuid, newstatus: newstatus, action: "story" },
        success: function(response) {


            if (appStatus == "storys-moderieren") {
                if (response.substring(0,6) == "<br />") {
                    document.getElementById("current-msc-ms").innerHTML = "<h5 style='word-wrap: break-word; overflow-wrap: break-word;'>"+response+"</h5>";
                    console.log(response);
    
                } else {
                    console.log(response);
                    contentload_storysmoderieren();
                }
            }

            if (appStatus == "story-info") {
                if (response.substring(0,6) == "<br />") {
                    document.getElementById("current-msc-ms").innerHTML = "<h5 style='word-wrap: break-word; overflow-wrap: break-word;'>"+response+"</h5>";
                    console.log(response);
    
                } else {
                    console.log(response);
                    htmlload_storyinfo(uuid);
                }
            }
            

        },
        error: function(error) {
            
            console.log(error);
        }
    });
}