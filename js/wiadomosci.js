function show(){    
   
    document.getElementById("content").innerHTML = "";
    var rawFile = new XMLHttpRequest();
    rawFile.onreadystatechange = function ()
    {
        if(rawFile.readyState == 3 && rawFile.status == 200){
            if(document.getElementById("switch").checked){
                document.getElementById("content").readOnly = true;
                document.getElementById("content").disabled = true;
             document.getElementById("content").innerHTML=rawFile.responseText;
            }
        }
        if(rawFile.readyState == 4)
        {
            rawFile.open("GET", "show.php", true);
            rawFile.send();
            
        }
    };
    rawFile.open("GET", "show.php", true);
    rawFile.send();
   
}

function send(){
    if (document.getElementById("username").value && document.getElementById("message").value && document.getElementById("switch").checked){
        
        var username = document.getElementById("username").value;
        var message = document.getElementById("message").value;
        var xhttp = new XMLHttpRequest();

        xhttp.open("GET", 'insert.php?username=' + username + '&message=' + message, true);
        xhttp.send();
        document.getElementById("message").value = "";
        document.getElementById("username").value = "";
    }
}



//function switchOnOff(){
//     var checkbox = document.getElementById('switch');
//    var messenger = document.getElementById('messengerContent');
//    if(checkbox.checked) {
//         messenger.style.visibility = 'visible';
//        setTimeout(function () {
//            show();
//        }, 500);
//    }
//    else {
//         messenger.style.visibility = 'hidden'; document.getElementById("content").innerHTML = "";
//    }
//}







