<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
 <?php require 'menu.php';?>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodawanie wpisu</title>
	
</head>
<body>
	<form action="wpis.php" method="post" enctype="multipart/form-data">
		
		Nazwa użytkownika:<br>
		<input type="text" name="username"/><br>
		
		
		Hasło:<br>
        </be><input type="password" name="password"/><br>

        
		Wpis:<br>
		<textarea name="content" cols="40" rows="5"></textarea><br>
		
		
        Data:<br>
        <input type="date" name="date"/> <br>
        
        Godzina:<br>
        <input type="time" name="time"/> <br>
        <br>
        
        
		<form action="plik.php" method="post" enctype="multipart/form-data">
		<input type="file" name="file1">
		<input type="file" name="file2">
		<input type="file" name="file3">
		<br><br>
		<input type="submit" value="Dodaj wpis"/>
		<input type="reset" value="Wyczyść">
 
		
		
	</form>
	
	
	
	


</body>
</html>
