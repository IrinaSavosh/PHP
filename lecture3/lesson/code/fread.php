<?php
//используется, когда файл большой
$file = fopen('file.txt', 'rb');
$data = fread($file, 100);
//обязательно закрыть файл, чтобы не занимать лишний ресурс
fclose($file);
echo $data;