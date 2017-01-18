function addFile() {
            
    var nowyNumer = document.childNodes.length / 2;
    var zmienna = document.createElement("input");
    zmienna.type = "file";
    zmienna.name = "file".concat(nowyNumer.toString());
    // zmienna.innerHTML = '<input type="file" name="File'+ nowyNumer + '">';
    //var zmienna = <input type="file" name="File'+ nowyNumer + '">;        //document.getElementById("last").insertAdjacentHTML(zmienna);
    document.getElementById("files").appendChild(zmienna);
}
