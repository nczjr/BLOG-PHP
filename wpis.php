<?php require 'menu.php';?>
<?php

    $dir = glob('*', GLOB_ONLYDIR);
    $foundBlog = null;
    foreach($dir as $blog){
        
        $file = fopen($blog.'/info','r') or die("Błąd przy otwieraniu");
    
        $arr = file($blog.'/info');

       
        fclose($file);
       
        if (trim($arr[0])==$_POST['username']){

            $foundBlog = $arr;
            $foundBlog[3] = $blog;
            break;
        }
    }
    if ($foundBlog == null){
        echo "Nie znaleziono użytkownika: ".$_POST['username'];
    }
    else {
        if (trim($foundBlog[1]) != md5($_POST['password'])){

            echo "Błędne hasło";
        }
        else {
            
            $fileName = str_replace('-', "", $_POST['date']) . str_replace(':', "", $_POST['time']) . date('s');
            $pattern = './' . $found_blog[3] . '/' . $fileName . '*';
            $addedNotes = glob($pattern);
            $uniqueNum = 0;
            if(!empty($addedNotes))
            {
              $uniqueNum = count($addedNotes);
            }
            $fileName = $fileName . sprintf("%02d", $uniqueNum);
            $foundBlog[4]=$fileName;
            $file = fopen($foundBlog[3] . '/' . $fileName , 'w') or die("Błąd przy tworzeniu pliku");
            fwrite($file,$_POST['content']);
            fclose($file);
            
            
            for($i=1;$i<=3;$i++){
                $fileToUpload = 'file' . $i;
                if (is_uploaded_file($_FILES[$fileToUpload]['tmp_name']) && file_exists($_FILES[$fileToUpload]['tmp_name'])) {
                    $orginalName = $_FILES[$fileToUpload]['name'];
                    $extension = pathinfo($orginalName, PATHINFO_EXTENSION);
                    echo $i . ' rozszerzenie : ' . $extension . '<br \>' ;
                    if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif") {
                        echo "Tylko rozszerzenia JPG, JPEG, PNG i GIF są dozwolone.";
                    }
                    else{
                        $finalDir = $foundBlog[3] . '/' . $foundBlog[4] . $i . '.' . $extension;

                        if(move_uploaded_file($_FILES[$fileToUpload]['tmp_name'], $finalDir)){
                            echo "<br/> Plik ". basename( $_FILES[$fileToUpload]['name']). " został dodany<br>";
                        }
                        else{
                            echo "Błąd podczas dodawania pliku. <br/>";
                        }
                    }
                }        
            }
            
        }    
        fclose($file);
    }
		
    echo '<a href=dodajwpis.php>Powrót</a>';
		
		

?>