<?php
$allow = false;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php if ($allow) { ?> 
        <!-- если allow = true, выводится первая часть -->
        Привет, Админ!
    <?php } else { ?>
                <!-- если allow = false, выводится вторая часть -->

        <form action="">
            <input type="text" placeholder="Введите пароль">
        </form>
    <?php } ?>
</body>

</html>


<!-- альтернативный синтаксис смотри в if_alter.php -->