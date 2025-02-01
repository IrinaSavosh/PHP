<?php
// Читает построчно и выводит точно так же как в исходном файле
$fileContents = file_get_contents('file.txt');
echo $fileContents;
