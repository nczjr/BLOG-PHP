<?php require 'menu.php'; include 'js/style.php'?>
<?php
//	$blogname=$_POST['blogname'];
//	$username=$_POST['username'];
//	$password=$_POST['password'];
//	$description=$_POST['decription'];
	$filename='info.txt';

    	
		if(is_dir($_POST['blogname'])){
			echo "Blog o takiej nazwie już istnieje! <br> ";
            echo '<a href=blog.html>Powrót</a>';
    
		}
		else { 
			mkdir($_POST['blogname'],0777);
			touch($filename);
			$file=fopen($_POST['blogname'].'/info.txt' , "w") or die('Błąd przy otwieraniu');
			//$pass=md5($password, $raw_output = null);
            //$array= array($_POST['username'],md5($_POST['password']),$_POST['description']);
            echo $_POST['description'];
             echo $_POST['username'];
             echo md5($_POST['password']);
			$toFile=$_POST['username'] . "\n" . md5($_POST['password']) . "\n" . $_POST['description'];
            //$file = implode('\n', $array);
			fwrite($file, $toFile);
			fclose($file);
            echo "Utworzono bloga o nazwie: ".$_POST['blogname'] . '<br/>';
            echo '<a href=blog.html>Powrót</a>';
		}

?>