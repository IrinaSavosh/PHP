<?php

$address = 'file.txt';

$name = readline("Введите имя: ");
$date = readline("Введите дату рождения в формате ДД-ММ-ГГГГ: ");

$data = $name . ", " . $date . "\r\n";

$fileHandler = fopen($address, 'c');

if(fwrite($fileHandler, $data)){
    echo "Запись $data добавлена в файл $address";
}
else {
    echo "Произошла ошибка записи. Данные не сохранены";
}

fclose($fileHandler);

//работа с JSON-файлами:
/**
 * $data = array('name'=>'Gtnh Gtnhjd', 'birthday' => '06-11-1998');
 * 
 * //кодирование в JSON
 * $json = json_encode($data);
 * 
 * //Раскодирование из JSON
 * $decodedData = json_decode($json);
 * print_r($decodedData);
 */