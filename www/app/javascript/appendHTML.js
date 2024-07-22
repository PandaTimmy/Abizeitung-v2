function appendHTML(file, destination) {
    document.getElementById(destination).innerHTML = '<div class="load" style="width: 100%; margin-top: 40vh;"></div>';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', file, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            setTimeout(function() {

            document.getElementById(destination).innerHTML = xhr.responseText;

            rescaleTextareas();
            rescaleTextareas();

            if(appStatus == "storys-moderieren") {
                contentload_storysmoderieren();
            }
            if(appStatus == "beichten-moderieren") {
                contentload_beichtenmoderieren();
            }
            if(appStatus == "zitate-moderieren") {
                contentload_zitatemoderieren();
            }
            if(appStatus == "benutzer") {
                htmlload_benutzer();
            }
        }, 0); // Verzögerung um 1 Sekunde

        } else {
            document.getElementById(destination).innerHTML = 'Die Anfrage war nicht erfolgreich. Fehlercode: ' + xhr.status;
        }
    };

    xhr.send();

}

function appendHTMLwithFunctions(file, destination, functions) {
    document.getElementById(destination).innerHTML = '<div class="load" style="width: 100%; margin-top: 40vh;"></div>';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', file, true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {
            setTimeout(function() {

            document.getElementById(destination).innerHTML = xhr.responseText;

            rescaleTextareas();
            rescaleTextareas();

            if(functions == "storys-moderieren") {
                contentload_zitatemoderieren();
            }
            if(functions == "beichten-moderieren") {
                contentload_beichtenmoderieren();
            }
            if(functions == "zitate-moderieren") {
                contentload_storysmoderieren();
            }
        }, 0); // Verzögerung um 1 Sekunde

        } else {
            document.getElementById(destination).innerHTML = 'Die Anfrage war nicht erfolgreich. Fehlercode: ' + xhr.status;
        }
    };

    xhr.send();

}