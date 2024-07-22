function zitategesendet(num) {
    appStatus = "countup";
    transition("zoom-out");
    reloadUI();


    document.getElementById("current-msc-ms").innerHTML = '<div class="load" style="width: 100%; margin-top: 40vh;"></div>';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', "countup.html", true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {

            document.getElementById("current-msc-ms").innerHTML = xhr.responseText;

            document.getElementById("numbercount-info").innerHTML = "Zitat abgeschickt!";
            document.getElementById("numbercount-current").innerHTML = num-1;
            document.getElementById("numbercount-new").innerHTML = num;
            document.getElementById("numbercount-subtitle").innerHTML = "ZITATE";
        
        } else {
            document.getElementById("current-msc-ms").innerHTML = 'Die Anfrage war nicht erfolgreich. Fehlercode: ' + xhr.status;
        }
    };

    xhr.send();


    setTimeout(function(){
        document.getElementById("numbercount-current").style.marginTop = "-186rem";
        document.getElementById("numbercontainer").style.transform = "scale(1)";
    }, 750);

    setTimeout(function(){
        navigate("bzs");
    }, 2500);

}

function beichtegesendet(num) {
    appStatus = "countup";
    transition("zoom-out");
    reloadUI();
    

    document.getElementById("current-msc-ms").innerHTML = '<div class="load" style="width: 100%; margin-top: 40vh;"></div>';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', "countup.html", true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {

            document.getElementById("current-msc-ms").innerHTML = xhr.responseText;

            document.getElementById("numbercount-info").innerHTML = "Beichte abgeschickt!";
            document.getElementById("numbercount-current").innerHTML = num-1;
            document.getElementById("numbercount-new").innerHTML = num;
            document.getElementById("numbercount-subtitle").innerHTML = "BEICHTEN";
            
        } else {
            document.getElementById("current-msc-ms").innerHTML = 'Die Anfrage war nicht erfolgreich. Fehlercode: ' + xhr.status;
        }
    };

    xhr.send();

    
    setTimeout(function(){
        document.getElementById("numbercount-current").style.marginTop = "-186rem";
        document.getElementById("numbercontainer").style.transform = "scale(1)";
    }, 750);

    setTimeout(function(){
        navigate("bzs");
    }, 2500);

}

function storygesendet(num) {
    appStatus = "countup";
    transition("zoom-out");
    reloadUI();

    
    document.getElementById("current-msc-ms").innerHTML = '<div class="load" style="width: 100%; margin-top: 40vh;"></div>';

    var xhr = new XMLHttpRequest();
    xhr.open('GET', "countup.html", true);

    xhr.onload = function() {
        if (xhr.status >= 200 && xhr.status < 300) {

            document.getElementById("current-msc-ms").innerHTML = xhr.responseText;
        
            document.getElementById("numbercount-info").innerHTML = "Story abgeschickt!";
            document.getElementById("numbercount-current").innerHTML = num-1;
            document.getElementById("numbercount-new").innerHTML = num;
            document.getElementById("numbercount-subtitle").innerHTML = "STORYS";
            
        } else {
            document.getElementById("current-msc-ms").innerHTML = 'Die Anfrage war nicht erfolgreich. Fehlercode: ' + xhr.status;
        }
    };

    xhr.send();


    setTimeout(function(){
        document.getElementById("numbercount-current").style.marginTop = "-186rem";
        document.getElementById("numbercontainer").style.transform = "scale(1)";
    }, 750);

    setTimeout(function(){
        navigate("bzs");
    }, 2500);

}