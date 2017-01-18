<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="szablon.css">
	<title>Zakładanie bloga</title>
</head>
<body>
<?php include 'menu.php';?>
	<form action="nowy.php" method="post">
		Nazwa bloga:<br />
		<input type="text" name="blogname"/><br />
		
		Nazwa użytkownika:<br />
		<input type="text" name="username"/><br />
		
		Hasło:<br />
        <input type="password" name="password"/><br />
        
		Opis bloga:<br />
		<textarea name="description" cols="40" rows="5"></textarea><br />
		
		
		<input type="submit" value="Załóż"/>
		<input type="reset" value="Wyczyść">
	</form>
	 
	
	
	


</body>
</html>
