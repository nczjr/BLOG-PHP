function showStyles(){
    var list = ""; 
    var style;
	for (var i = 0; (i < document.getElementsByTagName("link").length); i++) { 
		style = document.getElementsByTagName("link")[i];
        if (style.getAttribute("title")) { 
			title = style.getAttribute("title"); 
			list += "<a href=\"#\" onclick=\"setStyle(\'" + title + "\'); return false;\">Zmień styl na " + title + "</a><br/>"; 
		}
	}
	document.getElementById("styles").innerHTML = list; 
}

function setStyle(title){
    var style;
    for ( var i = 0 ; i < document.getElementsByTagName("link").length; i++) {
        style = document.getElementsByTagName("link")[i];
        if ( style.getAttribute("title")){
            style.disabled = true;
            if (style.getAttribute("title") == title ){
                style.disabled = false;
                createCookie(title,style);
            }
        }
    }
}

function getStyle(){
    var style;
    for ( var i = 0 ; style = document.getElementsByTagName(("link")[i]); i++) {
        if ( style.getAttribute("title") && !style.disabled){
            return style.getAttribute("title");
        }
        return null;
    }
}

function createCookie(name, style) {
	document.cookie = "style" + "=" + name  + "; path=/"; 
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return null;
}

window.onload = function(){               
    showStyles();
    if (document.getElementsByTagName("head")[0].getAttribute("data_validation") == "true")
        setAll();
    var styleCookie = getCookie("style"); 
	var styleTitle = styleCookie ? styleCookie : getStyle(); 
	setStyle(styleTitle); 

}



