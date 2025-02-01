<?php

// подключение файлов логики
// require_once('src/main.function.php');
// require_once('src/template.function.php');
// require_once('src/file.function.php');


//если будут добавляться файлы для автозагрузки в composer, то после этого нужно переустановить composer
require_once('vendor/autoload.php');

// вызов корневой функции
$result = main("/code/config.ini");
// вывод результата
echo $result; 
