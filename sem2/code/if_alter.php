<?php
    $name = "Админ";
    $allow = true;

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <!-- чтобы был более читаемый код, фигурные скобки заменили на if(): ... else:.... endif; -->
<?php if ($allow): ?>
    Привет <?=$name ?>
<?php else: ?>
    <form action="">
        <input type="text" placeholder="Введите логин">
    </form>
<?php endif; ?>
</body>
</html>