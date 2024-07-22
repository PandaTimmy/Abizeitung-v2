function storyAbschicken(user_login, story) {

    document.getElementById("send-story-button").style.display = "none";
    document.getElementById("send-story-button-load").style.display = "flex";
    console.log(story);

    if (story == " ☼") {

        setTimeout(() => {
            document.getElementById("send-story-button-load").style.display = "none";
            document.getElementById("send-story-button-error").style.display = "flex";
        }, 1000);

        setTimeout(() => {
            document.getElementById("send-story-button-error").style.display = "none";
            document.getElementById("send-story-button").style.display = "flex";
        }, 2000);
        
    } else {

        setTimeout(() => {

            $.ajax({
                type: "POST",
                url: "php/storyAbschicken.php", // Hier den Pfad zu deinem PHP-Skript angeben
                data: { user_login: user_login, story: story },
                success: function(response) {
                    // Hier kannst du den Erfolg der Anfrage behandeln
                    console.log(response);
        
                    if (response == "0") {
        
                        document.getElementById("send-zitat-button-load").style.display = "none";
                        document.getElementById("send-zitat-button-error").style.display = "flex";
                
                        setTimeout(() => {
                            document.getElementById("send-zitat-button-error").style.display = "none";
                            document.getElementById("send-zitat-button").style.display = "flex";
                        }, 2000);

                    }
                    else {

                        if (response.substring(0,6) == "<br />") {
                            
                            alert("Fatal Error: "+response);
                            navigate("profil");
                        } else {
                            storygesendet(response);

                        }
                        
                    }     
                },
                error: function(error) {
                    // Hier kannst du Fehler bei der Anfrage behandeln
                    console.log(error);

                    alert("Fatal Error: "+error);
                    navigate("profil");

                }
            });

        }, 500);


    }


    
}