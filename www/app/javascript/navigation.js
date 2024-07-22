function navigate(destination) {

    if(destination == "anmelden") {
        setIgnoreNavLayout();
    } else {
        unsetIgnoreNavLayout();
    }

    if (appStatus == "anmelden") {
        if (destination == "profil") {
            appStatus = "profil";
            transition("zoom-out");
            reloadUI();
            appendHTML("profil.html", "current-msc-ms");
            setTimeout(displayAdminOnly, 10);
            htmlload_profil();
        }
    }
    if (destination == "passwort-aendern") {
        console.log(destination);
        appStatus = "passwort-aendern";
        transition("swipe-left");
        reloadUI();
        appendHTML("passwort-aendern.html", "current-msc-ms");
    }
    if (destination == "bzs") {
        console.log(destination);
        appStatus = "bzs";
        transition("zoom-out");
        reloadUI();
        appendHTML("bzs.html", "current-msc-ms");
        zeilenTabelleZählenUndDivAktualisieren("zitate-count", "zitate", true);
        zeilenTabelleZählenUndDivAktualisieren("beichten-count", "beichten", true);
        zeilenTabelleZählenUndDivAktualisieren("storys-count", "storys", true);
    }
    if (destination == "ura") {
        console.log(destination);
        appStatus = "ura";
        transition("zoom-out");
        reloadUI();
        appendHTML("ura.html", "current-msc-ms");
    }
    if (destination == "countup-zitate") {
        console.log(destination);
        appStatus = "countup-zitate";
        transition("zoom-out");
        reloadUI();
        appendHTML("countup.html", "current-msc-ms");
    }
    if (destination == "zitate") {
        console.log(destination);
        appStatus = "zitate";
        transition("swipe-left");
        reloadUI();
        appendHTML("zitate.html", "current-msc-ms");
    }
    if (destination == "beichten") {
        console.log(destination);
        appStatus = "beichten";
        transition("swipe-left");
        reloadUI();
        appendHTML("beichten.html", "current-msc-ms");
    }
    if (destination == "storys") {
        console.log(destination);
        appStatus = "storys";
        transition("swipe-left");
        reloadUI();
        appendHTML("storys.html", "current-msc-ms");
    }
    if (destination == "profil") {
        console.log(destination);
        appStatus = "profil";
        if (getCookie("rolle") == "Admin") { footerbarAdmin = true; }
        transition("zoom-out");
        reloadUI();
        appendHTML("profil.html", "current-msc-ms");
        setTimeout(displayAdminOnly, 10);
        htmlload_profil();
    }
    if (destination == "moderation") {
        console.log(destination);
        appStatus = "moderation";
        transition("zoom-out");
        reloadUI();
        appendHTML("moderation.html", "current-msc-ms");
    }
    if (destination == "anmelden") {
        if (appStatus != "anmelden") {

            appStatus = "anmelden";
            transition("zoom-out");
            reloadUI();
            appendHTML("anmelden.html", "current-msc-ms");
        }
    }
    if (destination == "benutzer") {
        console.log(destination);
        appStatus = "benutzer";
        transition("swipe-left");
        reloadUI();
        appendHTML("benutzer.html", "current-msc-ms");
    }
    if (destination == "benutzer-bearbeiten") {
        console.log(destination);
        appStatus = "benutzer-bearbeiten";
        transition("swipe-left");
        reloadUI();
        appendHTML("benutzer-bearbeiten.html", "current-msc-ms");
        htmlload_benutzerbearbeiten(benutzerBearbeitenDestination);
    }

    if (destination == "storys-moderieren") {
        console.log(destination);
        appStatus = "storys-moderieren";
        transition("swipe-left");
        reloadUI();
        appendHTML("storys-moderieren.html", "current-msc-ms");
    }

    if (destination == "zitate-moderieren") {
        console.log(destination);
        appStatus = "zitate-moderieren";
        transition("swipe-left");
        reloadUI();
        appendHTML("zitate-moderieren.html", "current-msc-ms");
    }

    if (destination == "beichten-moderieren") {
        console.log(destination);
        appStatus = "beichten-moderieren";
        transition("swipe-left");
        reloadUI();
        appendHTML("beichten-moderieren.html", "current-msc-ms");
    }

    if (destination == "story-info") {
        console.log(destination);
        appStatus = "story-info";
        transition("swipe-left");
        reloadUI();
        appendHTML("story-info.html", "current-msc-ms");
    }

    if (destination == "zitat-info") {
        console.log(destination);
        appStatus = "zitat-info";
        transition("swipe-left");
        reloadUI();
        appendHTML("zitat-info.html", "current-msc-ms");
    }

    if (destination == "beichte-info") {
        console.log(destination);
        appStatus = "beichte-info";
        transition("swipe-left");
        reloadUI();
        appendHTML("beichte-info.html", "current-msc-ms");
    }

    if (destination == "start") {
        console.log(destination);
        appStatus = "start";
        transition("swipe-left");
        reloadUI();
        appendHTML("start.html", "current-msc-ms");
    }
}


function displayAdminOnly() {
    if (getCookie("rolle") == "Admin") {
        var elements = document.querySelectorAll('.adminONLY');
        for (var i = 0; i < elements.length; i++) {
            elements[i].style.display = 'block';
        }
    }
    
}

function navbarNavigateBack() {
    console.log("Navigate Back");
    if (appStatus == "passwort-aendern") {
        appStatus = "profil";
        transition("swipe-right");
        reloadUI();
        appendHTML("profil.html", "current-msc-ms");
        htmlload_profil();

    }
    if (appStatus == "benutzer") {
        appStatus = "moderation";
        transition("swipe-right");
        reloadUI();
        appendHTML("moderation.html", "current-msc-ms");
    }
    if (appStatus == "benutzer-bearbeiten") {
        appStatus = "benutzer";
        transition("swipe-right");
        reloadUI();
        appendHTML("benutzer.html", "current-msc-ms");
    }

    if (appStatus == "zitate" || appStatus == "beichten" || appStatus == "storys") {
        appStatus = "bzs";
        transition("swipe-right");
        reloadUI();
        appendHTML("bzs.html", "current-msc-ms");
    }

    if (appStatus == "zitate-moderieren" || appStatus == "beichten-moderieren" || appStatus == "storys-moderieren") {
        appStatus = "moderation";
        transition("swipe-right");
        reloadUI();
        appendHTML("moderation.html", "current-msc-ms");

    }


    if (appStatus == "zitat-info" || appStatus == "beichte-info" || appStatus == "story-info") {

        if (appStatus == "zitat-info" ) { appStatus = "zitate-moderieren"; }
        if (appStatus == "beichte-info" ) { appStatus = "beichten-moderieren"; }
        if (appStatus == "story-info" ) { appStatus = "storys-moderieren"; }
        
        transition("swipe-right");
        reloadUI();

        if (appStatus == "zitate-moderieren" ) {
            appendHTML("zitate-moderieren.html", "current-msc-ms");
        }
        if (appStatus == "beichten-moderieren" ) { 
            appendHTML("beichten-moderieren.html", "current-msc-ms");
        }
        if (appStatus == "storys-moderieren" ) {
            appendHTML("storys-moderieren.html", "current-msc-ms");
        }
    }


}


function navigateProfil() {
    navigate("profil");
}

function navigateBZS() {
    navigate("bzs");
}

function navigateAdmin() {
    navigate("moderation");
}

function navigateURA() {
    navigate("ura");
}

function loadUserEdit(user) {
    appStatus = "benutzer-bearbeiten";
    transition("swipe-left");
    reloadUI();
    appendHTML("benutzer-bearbeiten.html", "current-msc-ms");
    htmlload_benutzerbearbeiten(user);
}

function loadStoryInfo(uuid) {
    appStatus = "story-info";
    transition("swipe-left");
    reloadUI();
    appendHTML("story-info.html", "current-msc-ms");
    htmlload_storyinfo(uuid);
}

function loadZitatInfo(uuid) {
    appStatus = "zitat-info";
    transition("swipe-left");
    reloadUI();
    appendHTML("zitat-info.html", "current-msc-ms");
    htmlload_zitatinfo(uuid);
}

function loadBeichteInfo(uuid) {
    appStatus = "beichte-info";
    transition("swipe-left");
    reloadUI();
    appendHTML("beichte-info.html", "current-msc-ms");
    htmlload_beichteinfo(uuid);
}