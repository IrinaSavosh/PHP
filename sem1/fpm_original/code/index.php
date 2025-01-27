<?php

echo "Привет, GeekBrains!<br>".date("Y-m-d H:i:s") ."<br><br>";

echo "Что-то еще 123456<br><br>";

echo "Получилось!<br><br>";

$name = "Админ<br><br>";
echo $name;

// phpinfo();


// Очень интересная штука
$name = "Alex";
$str_name = "name";
echo $$str_name; //т.е. здесь $$str_name заменяется на $ + $str_name, что равно $ + name
echo "<br><br>";

$str_name2 = "name2";
$$str_name2 = "New";
echo $name2; // а здесь переменная name2 даже не создавалась явно, но компелятор читает это следующим образом последовательно: $$str_name2, что равно $ + $str_name2, т.е. $ + name2, что значит, что в строке $$str_name2 = "New" создается переменная $name2 со значением "New". Мозги могут завернуться от такого))))
echo "<br><br>";