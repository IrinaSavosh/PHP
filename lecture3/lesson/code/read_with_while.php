<?php

$address = 'file.txt';

if(file_exists($address) && is_readable($address)) {//файл доступен для чтения и хватает прав для чтения
    $file = fopen($address, "rb");

    $contents = ''; 
    while (!feof($file)) {// feof - функция, которая проверяет дошли ли мы до конца файла
        $contents .= fread($file, 100);
    }
    fclose($file);
    echo $contents;
}
else {
    echo("Файл невозможно открыть или он не существует");
}