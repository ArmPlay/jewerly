<?php

// конфигурационный файл
define("DEBUG", 1); // 1 - разработка, 0 - продакшн
// выбираем режим: разработки ли продакшна. В разработке все ошибки видны. В режиме продакшн ошибки логгируются
define("ROOT", dirname(__DIR__)); // указывает на корень нашего сайта (mobel.loc)
define("WWW", ROOT . '/public'); // указывает на нашу папку public
// все наши пути мы будем начинать со /
define("APP", ROOT . '/app'); // указывает на нашу папку с приложением с контроллерами, моделями и видами
define("CORE", ROOT . '/vendor/mobel/core'); // указывает на папку с ядром
define("LIBS", ROOT . '/vendor/mobel/core/libs'); // указывает на библиотеки в ядре
define("CACHE", ROOT . '/tmp/cache'); // указывает на папку с кешем
define("CONF", ROOT . '/config'); // указывает на папку с конфигурационными файлами
define("LAYOUT", 'jewerly'); // шаблон нашего сайта по умолчанию
define("PATH", 'http://' . $_SERVER['SERVER_NAME']); // URL главной страницы
define("ADMIN", PATH . '/manage'); // указывает на админку нашего сайта

require_once(ROOT . '/vendor/autoload.php');