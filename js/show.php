<?php
    $filename = 'wiadomosci.txt';
    if (!file_exists($filename)) {
        $file = fopen($filename, "w");
        fclose($file);
    } else {
        $file = fopen($filename, "r");
        $content = fread($file,filesize($filename));
        fclose($file);
        echo $content;
    }
?>