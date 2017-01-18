<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title>Dodawanie komentarzy</title>

</head>
<body>
<?php include 'menu.php';?>
	<form action="koment.php" method="post">
	    Rodzaj komentarza:<br>
        
          <select name="type">
              <option value="pozytywny">Pozytywny</option>
              <option value="neutralny">Neutralny</option>
              <option value="negatywny">Negatywny</option>
          </select>  <br>
          
		Nazwa/pseudonim:<br>
		<input type="text" name="user"/><br>
		
		Komentarz:<br>
		<textarea name="comment" cols="40" rows="5"></textarea><br>
        <input type="hidden" name="blogname" value="<?php echo $_POST['blogname'] ?>">
        <input type="hidden" name="articlename" value="<?php echo $_POST['articlename'] ?>">
		<input type="submit" value="Dodaj"/>
		<input type="reset" value="Wyczyść">
	</form>
	 
	
	
	


</body>
</html>
