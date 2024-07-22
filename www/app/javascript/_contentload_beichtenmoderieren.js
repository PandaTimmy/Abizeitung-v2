function contentload_beichtenmoderieren() {

    var user_login = getCookie("login");

    $.ajax({
        type: "POST",
        url: "php/-contentload-beichtenmoderieren.php", // Hier den Pfad zu deinem PHP-Skript angeben
        data: { user_login: user_login },
        success: function(response) {

            if (appStatus == "beichten-moderieren") {

            if (response.substring(0,6) == "<br />") {
                document.getElementById("beichten").innerHTML = "<h5 style='word-wrap: break-word; overflow-wrap: break-word;'>"+response+"</h5>";
                console.log(response);

            } else {
                document.getElementById("beichten").innerHTML = response;

                if(document.getElementById('filterBeichten').value == 'favs') {
                    var keinFavElements = document.querySelectorAll('.keinFav');
                    keinFavElements.forEach(function(element) {
                        element.style.display = 'none';
                    });
                } else {
                    var keinFavElements = document.querySelectorAll('.keinFav');
                    keinFavElements.forEach(function(element) {
                        element.style.display = 'block';
                    });
                };

            }
            
            }   
        },
        error: function(error) {
            
            console.log(error);
        }
    });

}