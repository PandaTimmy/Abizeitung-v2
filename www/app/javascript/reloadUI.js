function reloadUI() {
    if (appStatus == "anmelden") {

        navigateBack = false;
        navigateContinue = false;
        navigateTitle = "";

        footerbarShow = false;
        footerbarSelected = "profil";
        footerbarAdmin = false;

    }

    if (appStatus == "countup") {

        navigateBack = false;
        navigateContinue = false;
        navigateTitle = "";

        footerbarShow = false;
        footerbarSelected = "profil";

        setIgnoreFooterLayout()
    }

    if (appStatus == "profil") {

        navigateBack = false;
        navigateContinue = false;
        navigateTitle = "Profil";

        footerbarShow = true;
        footerbarSelected = "profil";

        unsetIgnoreFooterLayout()
    }

    if (appStatus == "passwort-aendern") {

        navigateBack = true;
        navigateContinue = false;
        navigateTitle = "Passwort Ändern";

        footerbarShow = false;
        footerbarSelected = "profil";

        setIgnoreFooterLayout()

    }

    if (appStatus == "bzs") {

        navigateBack = false;
        navigateContinue = false;
        navigateTitle = "Schülerbeiträge";

        footerbarShow = true;
        footerbarSelected = "bzs";

        unsetIgnoreFooterLayout()

    }


    if (appStatus == "zitate" || appStatus == "beichten" || appStatus == "storys") {

        navigateBack = true;
        navigateContinue = false;

        if (appStatus == "zitate") { navigateTitle = "Zitate"; }
        if (appStatus == "beichten") { navigateTitle = "Beichten"; }
        if (appStatus == "storys") { navigateTitle = "Storys"; }

        footerbarShow = false;
        footerbarSelected = "bzs";

        setIgnoreFooterLayout()

    }

    if (appStatus == "moderation") {

        navigateBack = false;
        navigateContinue = false;
        navigateTitle = "Moderation";

        footerbarShow = true;
        footerbarSelected = "admin";

        unsetIgnoreFooterLayout()
    }

    if (appStatus == "ura") {

        navigateBack = false;
        navigateContinue = false;
        navigateTitle = "Schülerumfragen";

        footerbarShow = true;
        footerbarSelected = "ura";

        unsetIgnoreFooterLayout()
    }

    if (appStatus == "benutzer") {

        navigateBack = true;
        navigateContinue = false;
        navigateTitle = "Benutzer";

        footerbarShow = false;
        footerbarSelected = "admin";

        setIgnoreFooterLayout()

    }

    if (appStatus == "benutzer-bearbeiten") {

        navigateBack = true;
        navigateContinue = false;
        navigateTitle = "Benutzer Bearbeiten";

        footerbarShow = false;
        footerbarSelected = "admin";

        setIgnoreFooterLayout()

    }

    if (appStatus == "zitate-moderieren" || appStatus == "beichten-moderieren" || appStatus == "storys-moderieren") {

        navigateBack = true;
        navigateContinue = false;

        if (appStatus == "zitate-moderieren") { navigateTitle = "Zitate Moderieren"; }
        if (appStatus == "beichten-moderieren") { navigateTitle = "Beichten Moderieren"; }
        if (appStatus == "storys-moderieren") { navigateTitle = "Storys Moderieren"; }

        footerbarShow = false;
        footerbarSelected = "admin";

        setIgnoreFooterLayout()

    }

    if (appStatus == "story-info" || appStatus == "beichte-info" || appStatus == "zitat-info") {

        navigateBack = true;
        navigateContinue = false;

        if (appStatus == "zitat-info") { navigateTitle = "Zitat Info"; }
        if (appStatus == "beichte-info") { navigateTitle = "Beichte Info"; }
        if (appStatus == "story-info") { navigateTitle = "Story Info"; }

        footerbarShow = false;
        footerbarSelected = "admin";

        setIgnoreFooterLayout()
    }


    restyleNavbar()
    restyleFooter()
}