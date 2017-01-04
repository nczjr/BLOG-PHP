
<?php
        
//    if(isset($_POST['submit']) && isset($_POST['type']) && !empty($_POST['user']) && !empty($_POST['comment']) && !empty($_POST['blogname']) && !empty($_POST['articlename'])){
        
if(!empty($_POST['articlename'])){
    

        $dir = './' . $_POST['blogname'] . '*';   //szukam folderow dla danego bloga
        $dirPattern = './' . $_POST['blogname'] . '/' . $_POST['articlename'] . '.k';
        $existingFolders = glob($dirPattern, GLOB_ONLYDIR);
        if(empty($existingFolders)){
            mkdir($dirPattern, 0755);
        }
        
        $comments = $dirPattern . '/*';
        $sem=sem_get(2);
        sem_acquire($sem);
        $addedComments = glob($comments);
    
        if (empty($addedComments)){
            $uniqueNum = 0;
        }
        else{
            $uniqueNum = count($addedComments); 
        }
        
        
        $file = fopen($dirPattern . '/' . $uniqueNum, 'w') or die("Błąd przy tworzeniu pliku");
        $array= array($_POST['type'], date("Y-m-d, h:i:s"),$_POST['user'],$_POST['comment']);
        $toFile = implode(PHP_EOL, $array);
        fwrite($file, $toFile);
        fclose($file);
        chmod($file, 0755);
        echo 'Komentarz dodany! <br/>';
        echo '<a href=blog.php?nazwa=' . $_POST['blogname'] . '>Powrót</a>';
        
    }
    else {
        echo 'Bład podczas dodawania';
    }
        
?>