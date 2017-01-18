<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Przeglądanie bloga</title>
	<meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />

</head>
<body>
    <?php
    include 'menu.php';

    define("blog", $_GET["nazwa"]);

        if (!isset($_GET["nazwa"])) { // jesli nie zostal podany indeks nazwa

            echo "Lista dostępnych blogów:";
            listblogs();

        } elseif (!is_dir(htmlspecialchars($_GET["nazwa"]))) { // jesli nie istnieje blog o nazwie pod indeksem nazwa

            echo "Nie znaleziono bloga!<br/>Lista dostępnych blogów:";
            listblogs();

        } else { 
            //$blog = htmlspecialchars($_GET["nazwa"]);
            echo "<h1>".blog." <br/></h1>";
            $file = fopen(blog.'/info','r') or die("Błąd przy otwieraniu");
            $arr = file(blog.'/info');
            fclose($file);
            echo "<h3>" . $arr[2] . "<br \></h3>" ;

            $files = array_filter(glob(blog.'/*'), 'is_file'); // tablica zawierajaca tylko pliki
            echo '<br \>';
            $entries = array_diff($files, array(blog.'/info')); // Usuniecie pliku info z tablicy plikow
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
                $toOpen = blog. "/" . $filename;
                $fileHandler = fopen($toOpen,'r') or die("Błąd przy otwieraniu");
                echo "<div id='article' style>";
                echo "<h2>Data dodania: " .$date . "<br/></h2>";
                echo "<p>";
                while(!feof($fileHandler)) {
                    echo fgets($fileHandler) . "<br/>";
                }
                echo "</p></div>";
            }

            function showAttachments($filename){
                echo "<br/>";
                $files = scandir(blog."/");
                foreach ($files as $file) {

                    if (substr($file, 0, 16) == $filename &&   $file != $filename   && $file != $filename.".k") {
                        echo "<a href='".blog."/".$file."'>$file</a><br>";
                    }
                }
                echo "<br/>";
            }

            function showComments($filename){
                 echo "<br/>";
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
                            Czas dodania: " . $datetime . "<br>
                            Typ: " . $commenttype . "<br>
                            Autor: " . $username . "<br>
                            Komentarz: " . $comment . "<br>";
                        }
                    }

                }    
                echo "<br/>";
                echo '<form action="dodajkom.php" method="post">' .
                          '<input type="hidden" name="blogname" value="' . blog . '">' .
                          '<input type="hidden" name="articlename" value="' . $filename . '">' .
                          '<input type="submit" name="submit" value="Skomentuj"></form>';        
                echo "<br/>";
            }   


    ?>
</body>
</html>
