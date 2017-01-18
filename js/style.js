function showStyles(){
    var list = ""; 
    var style;
	for (var i = 0; (i < document.getElementsByTagName("link").length); i++) { // Szukanie wszystkich elementow stylu
		style = document.getElementsByTagName("link")[i];
        if (style.getAttribute("title")) { // Jesli styl ma ustawiony tytul
			title = style.getAttribute("title"); 
			list += "<a href=\"#\" onclick=\"setStyle(\'" + title + "\'); return false;\">Zmień styl na " + title + "</a><br/>"; // Dodanie odpowiedniego stringa do listy stylow, zeby sie wyswietlalo jako odnosniki
		}
	}
    
	document.getElementById("styles").innerHTML = list; // Wpisanie w element z id="styleList" stworzonego stringa
    
}

function setStyle(title){
    var style;
    for ( var i = 0 ; i < document.getElementsByTagName("link").length; i++) {
        //document.getElementById("styles").innerHTML = "<br > ustawiam styl ";
        style = document.getElementsByTagName("link")[i];
        if ( style.getAttribute("title")){
            style.disabled = true;
            if (style.getAttribute("title") == title ){
                style.disabled = false;
                createCookie(title,style,10);
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

function createCookie(name, style, days) {
	if (days) { 
		var date = new Date();
		date.setTime(date.getTime() + (days*24*60*60*1000)); 
		var expires = "; expires=" + date.toGMTString(); 
  	}
	else expires = "";
	document.cookie = name + "=" + style + expires + "; path=/"; 
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
    return ;
}


window.onload = function(){               //dziala wyswietlanie styli ale nie dziala czas i data
    setAll();
    showStyles();
    var styleCookie = getCookie("style"); // Odczytanie nazwy stylu z ciasteczka
	var styleTitle = styleCookie ? styleCookie : getStyle(); 
	setStyle(styleTitle); 
   // if (document.getElementsByTagName("head")[0].getAttribute("isDateNeeded") == "true")
      //  setAll();
}

//function end(){
//    var styleTitle = getStyle();
//	createCookie("style", styleTitle, 10); 
//}



//window.onunload = end;

window.onunload = function() {
	var styleTitle = getStyle();
	createCookie("style", styleTitle, 10); 
}


var cookie = getCookie("style");
var styleTitle = cookie ? cookie : getStyle();
setStyle(styleTitle);


