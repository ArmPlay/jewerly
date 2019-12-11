
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- <meta name="title" content="Mobel.loc - подберем наилучшую мебель для вас!">
    <meta name="description" content="Mobel.loc - подберем наилучшую мебель для вас! Бля буду! Останетесь довольны!">
    <meta name="keywords" content="мебель шкафы кровати тумбы столы купить николаев от производителя дешево не дорого">-->
    <?=$this->getMeta();?>
</head>
<body>
<?php

?>
<h1>Шаблон DEFAULT</h1>
<?=$content;?>


<?php
        use RedBeanPHP\R;
        $logs = R::getDatabaseAdapter() //скрипт вывода запроса на экран
            ->getDatabase()
            ->getLogger();
        debug( $logs->grep( 'SELECT' ) );
?>
</body>
</html>