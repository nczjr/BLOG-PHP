<?php
    $name= $_GET["username"];
    echo $name;
    $message= $_GET["message"];
    $filename = 'wiadomosci.txt';
    $file = fopen($filename,'a');
    $toPrint = $name . ":" . $message . "\n";
    fwrite($file,$toPrint);
    $lines = file($filename);
    $count = count($lines);
    if ($count > 15 ){
        $output = $lines[0];
        unset($lines[0]);
        file_put_contents($filename, $lines);
    }
    fclose($file);
?>