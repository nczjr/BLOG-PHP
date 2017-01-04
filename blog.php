<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Przeglądanie bloga</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
</head>
<body>
<?php require 'menu.php';?>
<?php
    
    
define("blog", $_GET["nazwa"]);

    if (!isset($_GET["nazwa"])) { // jesli nie zostal podany indeks nazwa
        
        echo "Lista dostępnych blogów:";
        listblogs();
        
    } elseif (!is_dir(htmlspecialchars($_GET["nazwa"]))) { // jesli nie istnieje blog o nazwie pod indeksem nazwa
        
        echo "Nie znaleziono bloga!<br/>Lista dostępnych blogów:";
        listblogs();
    
    } else { 
        //$blog = htmlspecialchars($_GET["nazwa"]);
        echo "<h1>Blog ".blog." <br/></h1>";
        $file = fopen(blog.'/info.txt','r') or die("Błąd przy otwieraniu");
        $arr = file(blog.'/info.txt');
        fclose($file);
        echo "<h2>Opis: " . $arr[2] . "<br \></h2>" ;
        
        $files = array_filter(glob(blog.'/*'), 'is_file'); // tablica zawierajaca tylko pliki
        echo '<br \>';
        $entries = array_diff($files, array(blog.'/info.txt')); // Usuniecie pliku info z tablicy plikow
        arsort($entries); 
        
        foreach ($entries as $entry){
             $filename = pathinfo($entry, PATHINFO_FILENAME);
             if(strlen($filename)==16){
                showArticle($filename);
                showAttachments($filename);
                showComments($filename);
             }
        }
        
    }
    
        function listblogs() {
            $blogs = glob('*', GLOB_ONLYDIR); //
            echo "<ul>";
            foreach ($blogs as $blogname) {
                echo "<li><a href=blog.php?nazwa=$blogname>$blogname</a></li>";
            }
            echo "</ul>";
        }
    
    
    
        function showArticle($filename){
            $date = substr($filename,0,4) .'.'. substr($filename,4,2) .'.'. substr($filename,6,2) .' ' .  substr($filename,8,2) .':'. substr($filename,10,2) .':'. substr($filename,12,2);
            $toOpen = blog. "/" . $filename . ".txt";
            $fileHandler = fopen($toOpen,'r') or die("Błąd przy otwieraniu");
            echo "<h3>Data dodania: " .$date . "<br/></h2>";
            echo "<p>";
            while(!feof($fileHandler)) {
                echo fgets($fileHandler) . "<br/>";
            }
            echo "</p>";
        }
        
        function showAttachments($filename){
            echo "<p>";
            $files = scandir(blog."/");
            foreach ($files as $file) {
                
                if (substr($file, 0, 16) == $filename &&  ( $file != $filename . '.txt' ) && $file != $filename.".k") {
                    echo "<a href='".blog."/".$file."'>$file</a><br>";
                }
            }
            echo "</p>";
        }
        
        function showComments($filename){
             echo "<p>";
             $comments_dir = blog . "/" . $filename . ".k";
             if(is_dir($comments_dir)) {
                $files = scandir($comments_dir);
                foreach ($files as $item) {
                    if (is_numeric($item)) {
                        $commentfile = fopen($comments_dir . "/" . $item, "r");
                        $commenttype = fgets($commentfile);
                        $datetime = fgets($commentfile);
                        $username = fgets($commentfile);
                        $comment = fgets($commentfile);
                        fclose($commentfile);
                        echo "
                        Czas: " . $datetime . "<br>
                        Typ: " . $commenttype . "<br>
                        Nazwa: " . $username . "<br>
                        Komentarz: " . $comment . "<br>";
                    }
                }
    
            }    
            echo '<form action="dodajkom.php" method="post">' .
                      '<input type="hidden" name="blogname" value="' . blog . '">' .
                      '<input type="hidden" name="articlename" value="' . $filename . '">' .
                      '<input type="submit" name="submit" value="Skomentuj"></form>';        
            echo "</p>";
        }   


?>
</body>
</html>
