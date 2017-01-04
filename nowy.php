<?php require 'menu.php';?>
<?php
	$filename='info';

    	
		if(is_dir($_POST['blogname'])){
			echo "Blog o takiej nazwie już istnieje! <br> ";
            echo '<a href=blog.html>Powrót</a>';
    
		}
		else { 
			mkdir($_POST['blogname'],0777);
			touch($filename);
			$file=fopen($_POST['blogname'].'/info' , "w") or die('Błąd przy otwieraniu');
            $array= array($_POST['username'],md5($_POST['password']),$_POST['description']);
            
            $toFile = implode(PHP_EOL, $array);
			fwrite($file, $toFile);
        
			fclose($file);
            echo "Utworzono bloga o nazwie: ".$_POST['blogname'] . '<br/>';
            echo '<a href=blog1.php>Powrót</a>';
		}

?>