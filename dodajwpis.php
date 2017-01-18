<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodawanie wpisu</title>
    <?php include 'style.php';?>
    <script src="js/data.js" type="text/javascript"></script>
    <script src="js/style.js" type="text/javascript"></script> 
    <script src="js/pliki.js" type="text/javascript"></script>

</head>
<!--<body onload="dateSet(); timeSet();"      <!-- z tym dziala ustawianie czasu wraz ze zmienianiem styli starterem, ale nie dziala onload -->
<body>
    <?php include 'menu.php';?>
	<form action="wpis.php" method="post" enctype="multipart/form-data">
		
		Nazwa użytkownika:<br>
		<input type="text" name="username"/><br>
		
		
		Hasło:<br>
        </be><input type="password" name="password"/><br>

        
		Wpis:<br>
		<textarea name="content" cols="40" rows="5"></textarea><br>
		
		
        Data:<br>
        <input type="text" id ="dateForm" name="date" value="dateSet()"  onchange="check()"/> <br>
        
        
        Godzina:<br>
        <input type="text" id="timeForm" name="time" value="timeSet()" /> <br>
        <br>
        
  
        <div id = "files" >
		
		<input type="button" value="Dodaj plik" onclick="addFile()">
		
		</div>
		<br><br>
		
		<input type="submit" value="Dodaj wpis"/>
		
		<input type="reset" value="Wyczyść" >
 
		
		
	</form>
	
	
	
	


</body>
</html>
