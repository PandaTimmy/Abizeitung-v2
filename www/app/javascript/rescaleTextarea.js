function rescaleTextareas() { // Durch alle textareas durchlaufen, id herausfinden und dann rescalen
    var elements = document.getElementsByClassName("input-long-textarea");
    
    for (var i = 0; i < elements.length; i++) {

        var id = elements[i].id[1];
        var element = elements[i];
        element.style.height =  document.getElementById("I"+id+"L").offsetHeight + 'rem';
        element.style.height = (element.scrollHeight) + "rem";
        element.style.paddingTop = (document.getElementById("I"+id+"L").offsetHeight + 9)+"rem";
        element.style.marginTop = (document.getElementById("I"+id+"L").offsetHeight*-1)+"rem";
        document.body.style.height = document.body.offsetHeight + "rem";
    }
}
