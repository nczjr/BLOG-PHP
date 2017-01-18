<?php require 'menu.php'; ?>
<?php

    if(isset($_POST['submit']) && !empty($_POST['blogname']) && !empty($_POST['username']) && !empty($_POST['password'])){
        define('SEM_KEY', 1002);
        $filename='info';

        $semRes = sem_get(SEM_KEY, 1, 0666, 0);	
        if(sem_acquire($semRes)) {
            if(is_dir($_POST['blogname'])){
                echo "Blog o takiej nazwie już istnieje! <br/> ";
                echo '<a href=blog1.php>Powrót</a>';

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
                header('Location: blog.php?nazwa='.$_POST['blogname'] );
            }
        sem_release($semRes);
        }
}else {
    echo 'Błąd w formularzu! ';
    echo '<a href=blog1.php>Wypełnij jeszcze raz</a>';
}
?>