function dateSet() {
	var date_obj = new Date();
	var dt = date_obj.getFullYear() + "-" + (date_obj.getMonth() + 1) + "-" + date_obj.getDate();
	document.getElementById('dateForm').value = dt;
}	
function check() {
	var flag = true;
    var dt = document.getElementById('dateForm').value;	
	var splited = dt.split('-');
				
	if (splited[0] < 0 || splited[1] < 0 || splited[1] > 12 || splited[2] < 0 || splited[2] > 31) {
        flag = false;
	}
	if (!flag) {
        dateSet();
	}			
}

function timeSet() {
    var date_obj = new Date();
    var t = date_obj.getHours() + ":" + date_obj.getMinutes();
    document.getElementById('timeForm').value = t;
}
	
function setAll(){
    dateSet();
    timeSet();
}
